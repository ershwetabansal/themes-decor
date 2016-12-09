<?php

namespace App\DiskBrowser;

use App\DiskBrowser\Contracts\DiskBrowserContract;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Exceptions\Filesystem\DirectoryAlreadyExistsException;

class DiskBrowser implements DiskBrowserContract
{

    /**
     * @var string
     */
    private $disk = 'local';

    /**
     * @param string $diskName
     */
    public function __construct($diskName)
    {
        $this->disk = $diskName;
    }

    /**
     * List all files in a given directory.
     *
     * @param string $path
     * @return array
     */
    public function listFilesIn($path)
    {
        try {
            if (Directory::exists($this->disk, $path)) {
                return(collect(File::filesIn($this->disk, $path))
                    ->filter(function ($file) {
                        return File::isFileAllowedOnDisk($file, $this->disk);
                    })
                    ->map(function ($file) {
                        return File::metaDataOf($file, $this->disk);
                    })
                    ->values()
                    ->all());
            }
        } catch (\Exception $e) {

        }

        return [];
    }

    /**
     * List all files (recursively) in a given directory.
     *
     * @param string $path
     * @return array
     */
    public function listAllFilesIn($path)
    {
        try {
            if (Directory::exists($this->disk, $path)) {
                return(collect(File::allFilesIn($this->disk, $path))
                    ->filter(function ($file) {
                        return File::isFileAllowedOnDisk($file, $this->disk);
                    })
                    ->map(function ($file) {
                        return File::metaDataOf($file, $this->disk);
                    })
                    ->values()
                    ->all());
            }
        } catch (\Exception $e) {

        }

        return [];
    }

    /**
     * List all directories in a given directory.
     *
     * @param string $path
     * @return array
     */
    public function listDirectoriesIn($path)
    {

        try {
            if (Directory::exists($this->disk, $path)) {
                return(collect(Directory::directoriesIn($this->disk, $path))
                    ->map(function ($directory) {
                        return  Directory::metaDataOf($directory, $this->disk);
                    })
                    ->values()
                    ->all());
            }
        } catch (\Exception $e) {

        }

        return [];
    }

    /**
     * Create a directory with a given name.
     *
     * @param string $name
     * @param string $path
     * @return array
     * @throws DirectoryAlreadyExistsException
     */
    public function createDirectory($name, $path)
    {
        try {
            if (Directory::exists($this->disk, $path) && Directory::notExists($name, $this->disk, $path)) {
                Directory::createDirectory($name, $this->disk, $path );
                return Directory::metaDataOf(Path::normalize($path) . $name , $this->disk);
            }
        } catch (\Exception $e) {

        }

        return false;
    }

    /**
     * Create a directory with a given name.
     *
     * @param $path
     * @param $oldName
     * @param $newName
     * @return array
     * @throws DirectoryAlreadyExistsException
     */
    public function renameDirectory($path, $oldName, $newName)
    {

        try {
            if (Directory::exists($this->disk, $path . $oldName) && Directory::notExists($newName, $this->disk, $path)) {
                Directory::renameDirectory($oldName, $this->disk, $path, $newName );
                return Directory::metaDataOf(Path::normalize($path) . $newName , $this->disk);
            }
        } catch (\Exception $e) {

        }

        return [];
    }

    /**
     * Create file in a directory.
     *
     * @param UploadedFile $file
     * @param string $path
     * @return array
     */
    public function createFile(UploadedFile $file, $path)
    {
        try {
            $newFileName = File::generateUniqueFileName($file);

            if (Directory::exists($this->disk, $path)) {
                File::uploadFile($file, $newFileName, $this->disk, $path);
                return File::metaDataOf(Path::normalize($path) . $newFileName, $this->disk);
            }
        } catch(\Exception $e) {

        }

        return [];
    }

    /**
     * Search a string in disk matching files' and directories' names.
     *
     * @param string $searchedWord
     * @return array
     */
    public function search($searchedWord)
    {
        try {
            return [
                'files' => File::searchDisk($searchedWord, $this->disk),
                'directories' => Directory::searchDisk($searchedWord, $this->disk),
            ];
        } catch (\Exception $e) {

        }
        return [];
    }

    /**
     * Delete a directory only if directory is empty.
     *
     * @param string $directory
     * @param string $path
     * @return bool
     */
    public function deleteDirectory($directory, $path)
    {
        try {
            return Directory::delete(Path::normalize($path) . $directory, $this->disk);
        } catch (\Exception $e) {

        }
        return [];
    }

}

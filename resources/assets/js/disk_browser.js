

var browser = FileBrowser().getInstance();
browser.setup({

    disks : {
        search : true,
        search_URL: '/api/v1/disk/search',
        details : [
            {
                name: 'image_disk',
                label: 'Images',
                allowed_extensions: ['png','jpg','jpeg','bmp','tiff','gif']
            },
            {
                name: 'image_disk',
                label: 'Themes',
                root_directory_path: '/themes',
                allowed_extensions: ['png','jpg','jpeg','bmp','tiff','gif']
            },
            {
                name: 'image_disk',
                label: 'Offers',
                root_directory_path: '/offers',
                allowed_extensions: ['png','jpg','jpeg','bmp','tiff','gif']
            },
            {
                name: 'image_disk',
                label: 'Products',
                root_directory_path: '/products',
                allowed_extensions: ['png','jpg','jpeg','bmp','tiff','gif']
            },
            {
                name: 'image_disk',
                label: 'Services',
                root_directory_path: '/services',
                allowed_extensions: ['png','jpg','jpeg','bmp','tiff','gif']
            }
        ]
    },
    directories: {
        list: '/api/v1/disk/directories',
        create: '/api/v1/disk/directory/store'
    },
    files: {
        list: '/api/v1/disk/files',
        upload: {
            url: '/api/v1/disk/file/store',
            params:[]
        },
        thumbnail: {
            show : true,
            directory : '/thumbnails',
            path : '',
            prefix : '',
            suffix : ''
        },
        size_unit : 'KB'
    },
    http : {
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        error : function(status, response) {
            var message = '';
            if (status == '422') {
                for (var key in response) {
                    if (typeof(response[key]) == 'object') {
                        message = message + response[key][0] + ' ';
                    }
                }
            }
            return (message == '') ? 'Error encountered. ' : message ;
        }
    },
    authentication : "session"
});

function tinmyceDiskBrowser(field_id, url, type, win)
{
    browser.openBrowser({
        disks : [
            'Website assets', 'Publication images'
        ],
        button : {
            text : 'Update URL',
            onClick : function(path) {
                win.document.getElementById(field_id).value = path;
            }
        }
    });
}

/**
 * Set up the callback and other config parameters on display of disk browser.
 *
 * @param callback
 * @param disks
 */
function accessBrowser(callback, disks)
{
    var configParameters = {
        button : {
            text : 'Update URL',
            onClick : function(path) {
                if (callback) callback(path);
            }
        }
    };

    if (disks) {
        configParameters.disks = getArrayFromCSV(disks);
    }

    browser.openBrowser(configParameters);
}

/**
 * Convert a csv to an array.
 *
 * @param csv
 * @returns {*}
 */
function getArrayFromCSV(csv)
{
    // Return empty array if csv is not defined
    if (!csv) {
        return [];
    }

    if (csv.indexOf(',')) {
        return csv.split(',');
    }

    return [csv];
}

/**
 * Display disk browser and update the link in the corresponding input field.
 * Add attribute data-disk-browser="true" and data-link-update="field_name" on the button
 * where field_name is the data-type of input
 */
(function() {
    $('[data-disk-browser="true"]').each(function() {

        var updateInput = $(this).attr('data-link-update');
        var updateImage = $(this).attr('data-image-update');
        $(this).click(function() {
            accessBrowser(function(path) {
                if (updateInput) {
                    $('[data-type="'+updateInput+'"]').val(path).trigger('change');
                }

                if (updateImage) {
                    $('[data-type="'+updateImage+'"]').attr('src', path);
                }
            }, $(this).attr('data-disks'));
        });
    });

})();
<div class="modal fade" id="confirmation-modal-box" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body modal-confirmation">
                <div class="alert alert-danger hidden" id="error">
                    <a class="close" data-close-btn="error" aria-label="close">&times;</a>
                    <ul></ul>
                </div>
                <div class="alert alert-success hidden text-center" id="success"></div>

                <div class="text-center">
                    <p id="message">&nbsp;</p>
                </div>

            </div>
            <div class="modal-footer">
                <img src="/images/site/loading.gif" alt="Loading" class="hidden" id="loading"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="process-btn" type="button" class="btn btn-success">Yes</button>
            </div>
        </div>
    </div>
</div>

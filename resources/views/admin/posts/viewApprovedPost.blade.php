<div class="modal fade" id="show_Approved_post" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="singlepage">
                    <img src="" class="post_image"/>
                    <br>
                    <br>
                    <p class="body_post"></p>
                    <div class="clear"> </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-url="{{ route('disapproved-post') }}" class="disapproved btn btn-primary">{{ trans('admin/post.Disappproved') }}</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('user/index.Close') }}</button>
            </div>
        </div>
    </div>
</div>

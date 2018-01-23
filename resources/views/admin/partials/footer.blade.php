</div>
<!-- /.container-fluid -->
<footer class="footer text-center"> {{ trans('admin/admin.2017') }} &copy;  {{ trans('admin/admin.signature') }} </footer>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
{{ Html::script('assets/admin/plugins/bower_components/jquery/dist/jquery.min.js') }}
{{ Html::script('assets/admin/js/bootstrap.min.js') }}
{{ Html::script('assets/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}
{{ Html::script('assets/admin/js/jquery.slimscroll.js') }}
{{ Html::script('assets/admin/js/waves.js') }}
{{ Html::script('assets/admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}
{{ Html::script('assets/admin/plugins/bower_components/counterup/jquery.counterup.min.js') }}
{{ Html::script('assets/admin/plugins/bower_components/raphael/raphael-min.js') }}
{{ Html::script('assets/admin/plugins/bower_components/morrisjs/morris.js') }}
{{ Html::script('assets/admin/js/custom.min.js') }}
{{ Html::script('assets/admin/js/dashboard1.js') }}
{{ Html::script('assets/admin/plugins/bower_components/toast-master/js/jquery.toast.js') }}
<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Pixel admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
</script>
</body>
</html>

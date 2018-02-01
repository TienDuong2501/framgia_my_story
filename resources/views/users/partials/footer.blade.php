
    {!! Html::script('assets/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('js/app.js') !!}
	{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}
	{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js') }}
	@stack('script')
</body>
</html>

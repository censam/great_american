<div class="box-body">
    <p>
      {!! Form::normalInput('name', 'Name', $errors,$news) !!}
      {!! Form::normalInput('url', 'Address', $errors,$news) !!}
      {!! Form::normalTextarea('short_content', 'Short Content', $errors,$news) !!}
      {!! Form::normalTextarea('long_content', 'Long Content', $errors,$news) !!}
    </p>
</div>
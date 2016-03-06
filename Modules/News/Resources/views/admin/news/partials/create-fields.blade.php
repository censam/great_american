<div class="box-body">
    <p>
      {!! Form::normalInput('name', 'Name', $errors) !!}
      {!! Form::normalInput('url', 'Address', $errors) !!}
      {!! Form::normalTextarea('short_content', 'Short Content', $errors) !!}
      {!! Form::normalTextarea('long_content', 'Long Content', $errors) !!}
    </p>
</div>
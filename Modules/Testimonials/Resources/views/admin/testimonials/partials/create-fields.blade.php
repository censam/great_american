<div class="box-body">
    <p>
      {!! Form::normalInput('name', 'Name', $errors) !!}
      {!! Form::normalInput('address', 'Address', $errors) !!}
      {!! Form::normalTextarea('content', 'Content', $errors) !!}
      {!! Form::normalInput('reviews', 'Reviews', $errors) !!}
    </p>
</div>

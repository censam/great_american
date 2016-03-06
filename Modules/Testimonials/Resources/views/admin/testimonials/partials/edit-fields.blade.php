<div class="box-body">
    <p>
      {!! Form::normalInput('name', 'Name', $errors,$testimonials) !!}
      {!! Form::normalInput('address', 'Address', $errors,$testimonials) !!}
      {!! Form::normalTextarea('content', 'Content', $errors,$testimonials) !!}
      {!! Form::normalInput('reviews', 'Reviews', $errors,$testimonials) !!}
    </p>
</div>
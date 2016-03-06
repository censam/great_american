@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('testimonials::testimonials.title.testimonials') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('testimonials::testimonials.title.testimonials') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.testimonials.testimonials.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('testimonials::testimonials.button.create testimonials') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Content</th>
                            <th>Reviews</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($testimonials)): ?>
                        <?php foreach ($testimonials as $testimonials): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                    {{ $testimonials->id }}
                                </a>
                            </td>
                             <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                    {{ $testimonials->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                    {{ $testimonials->address }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                     {!! str_limit($testimonials->content,100) !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                     {!! $testimonials->reviews !!}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}">
                                    {{ $testimonials->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.testimonials.testimonials.edit', [$testimonials->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.testimonials.testimonials.destroy', [$testimonials->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Content</th>
                            <th>Reviews</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('testimonials::testimonials.title.create testimonials') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.testimonials.testimonials.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop

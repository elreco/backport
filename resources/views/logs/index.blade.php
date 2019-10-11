<script data-exec-on-popstate>

    $(function () {
        BP.intervalIds = [];
        BP.addIntervalId = function (intervalId, persist) {
            this.intervalIds.push({id:intervalId, persist:persist});
        };

        BP.clearIntervalId = function (intervalId) {
            for (var id in this.intervalIds) {
                if (intervalId == this.intervalIds[id].id && !this.intervalIds[id].persist) {
                    clearInterval(intervalId);
                    this.intervalIds.splice(id, 1);
                }
            }
        };

        BP.cleanIntervalId = function () {
            for (var id in this.intervalIds) {
                if (!this.intervalIds[id].persist) {
                    clearInterval(this.intervalIds[id].id);
                    this.intervalIds.splice(id, 1);
                }
            }
        };

        $(document).on('pjax:complete', function(xhr) {
            $.admin.cleanIntervalId();
        });

        $('.log-refresh').on('click', function() {
            $.pjax.reload('#pjax-container');
        });

        var pos = {{ $end }};

        function changePos(offset){
            pos = offset;
        }

        function fetch() {
            $.ajax({
                url:'{{ $tailPath }}',
                method: 'get',
                data : {offset : pos},
                success:function(data) {
                    for (var i in data.logs) {
                        $('table > tbody > tr:first').before(data.logs[i]);
                    }
                    changePos(data.pos);
                }
            });
        }

        var refreshIntervalId = null;

        $('.log-live').click(function() {
            $("i", this).toggleClass("fa-play fa-pause");

            if (refreshIntervalId) {
                $.admin.clearIntervalId(refreshIntervalId);
                refreshIntervalId = null;
            } else {
                refreshIntervalId = setInterval(function() {
                    fetch();
                }, 2000);
                $.admin.addIntervalId(refreshIntervalId, false);
            }
        });
    });


</script>
<div class="row">

    <!-- /.col -->
    <div class="col-lg-9 col-xl-10">
        <div class="bp-portlet">

            <div class="bp-portlet__head">
                <div class="bp-portlet__head-toolbar">
                    <button type="button" class="btn btn-primary btn-sm log-refresh mr-1"><i class="fa fa-sync"></i> {{ trans('admin.refresh') }}</button>
                    <button type="button" class="btn btn-secondary btn-sm log-live"><i class="fa fa-play"></i> </button>
                </div>
                <div class="bp-portlet__head-toolbar">
                    <div class="btn-group">
                        @if ($prevUrl)
                        <a href="{{ $prevUrl }}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-left"></i></a>
                        @endif
                        @if ($nextUrl)
                        <a href="{{ $nextUrl }}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>


            <div class="box-header with-border">


                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

                <div class="table-responsive">
                    <table class="table table-hover table-head-noborder">

                        <thead>
                            <tr>
                                <th>Level</th>
                                <th>Env</th>
                                <th>Time</th>
                                <th>Message</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($logs as $index => $log)

                            <tr>
                                <td><span class="badge badge-{{\Wiledia\Backport\Controllers\Logs\LogViewer::$levelColors[$log['level']]}}">{{ $log['level'] }}</span></td>
                                <td><strong>{{ $log['env'] }}</strong></td>
                                <td style="width:150px;">{{ $log['time'] }}</td>
                                <td><code style="word-break: break-all;">{{ $log['info'] }}</code></td>
                                <td>
                                    @if(!empty($log['trace']))
                                    <a class="btn btn-secondary btn-sm" data-toggle="collapse" data-target=".trace-{{$index}}" tabindex><i class="fa fa-info"></i>&nbsp;&nbsp;Exception</a>
                                    @endif
                                </td>
                            </tr>

                            @if (!empty($log['trace']))
                            <tr class="collapse trace-{{$index}}">
                                <td colspan="5"><div style="white-space: pre-wrap;background: #323435;color: #fff; padding: 10px; border-radius: 6px;">{{ $log['trace'] }}</div></td>
                            </tr>
                            @endif

                        @endforeach

                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>



    <div class="col-lg-3 col-xl-2">
    	<div class="bp-portlet">
            <div class="bp-portlet__head">
                <div class="bp-portlet__head-label">
                    <h3 class="bp-portlet__head-title">Files</h3>
                </div>
            </div>

            <div class="bp-portlet__body bp-portlet__body--fit">
                <ul class="bp-nav bp-nav--bold bp-nav--md-space bp-nav--v3 bp-padding-t-0">
                    @foreach($logFiles as $logFile)
                        <li class="bp-nav__item">
                            <a class="bp-nav__link {{ $logFile == $fileName ? 'active' : '' }}" href="{{ route('logs-file', ['file' => $logFile]) }}">
                                <span class="bp-nav__link-icon"><i class="fa fa-{{ ($logFile == $fileName) ? 'folder-open' : 'folder' }}"></i></span>
                                <span class="bp-nav__link-text">{{ $logFile }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="bp-portlet">
            <div class="bp-portlet__head">
                <div class="bp-portlet__head-label">
                    <h3 class="bp-portlet__head-title">Info</h3>
                </div>
            </div>

            <div class="bp-portlet__body">
                <span><i class="fas fa-file"></i> Size: <strong>{{ $size }}</strong></span>
                <span><i class="fas fa-calendar-alt"></i> Updated at: <strong>{{ date('Y-m-d H:i:s', filectime($filePath)) }}</strong></span>
            </div>
        </div>
    </div>
</div>

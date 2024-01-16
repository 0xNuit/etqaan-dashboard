<x-layout>
    <!-- MAIN -->

    <!-- Add Project Manager Modal -->
    <div class="main_modal" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModalLabel" aria-hidden="true" style="display: none;">
        <!-- ... Your existing modal code ... -->
    </div>

    <main>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>مدراء المشاريع</h3>
                    <div data-toggle="modal" data-target="#addAssetModal">
                        <span>إضافة مدير مشروع</span>
                        <i class='bx bx-plus'></i>
                    </div>
                </div>

                <table class="show_table">
                    <thead>
                        <tr>
                            <th>التاريخ</th>
                            <th>الحالة</th>
                            <th>الملاحظة</th>
                            <th>اسم الملف</th>
                            <th>المستخدم</th>
                            <th>المهمة</th>
                            <th>الأصل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>
                                    <p>{{ $log->created_at }}</p>
                                </td>
                                <td>
                                    <p>{{ $log->status}}</p>
                                </td>
                                <td>
                                    <p>{{ $log->notes}}</p>
                                </td>
                                <td>
                                    @if($log->file_name )
                                        
                                    <p>{{ $log->file_name }}</p>
                                    <a href="{{ URL::to('/') }}/{{$log->file_name}}"
                                        target="__blank">
                                        <img style="width:18px;"src="{{ asset('assets/report_d.png')}}" alt="">
                                        {{-- <label style="color:#3c91e6;"> المرفق</label> --}}
                                    </a>
                                    @else
                                    <p>{{ $log->file_name }}</p>
                                    <a href="{{ URL::to('/') }}/{{$log->file_name}}"
                                        target="__blank">
                                        {{-- <img style="width:18px;"src="{{ asset('assets/report_d.png')}}" alt=""> --}}
                                        {{-- <label style="color:#3c91e6;"> المرفق</label> --}}
                                    </a>
                                    
                                    @endif
                                </td>
                                <td>
                                    <p>{{ $log->user_name }}</p>
                                </td>
                                <td>
                                    <p>{{ $log->procedure_title }}</p>
                                </td>
                                <td>
                                    <p>{{ $log->asset_title }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->

</x-layout>

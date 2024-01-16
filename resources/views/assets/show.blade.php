<x-layout>
    <!-- MAIN -->
    <main>
        <div class="table-data">
                <div class="todo">
                    <div class="head">
                        {{-- <iconify-icon icon="tabler:edit" style="color: #3c91e6;"></iconify-icon> --}}
                        <a href="{{ route('asset.edit', $asset->id) }}" style="color: #3c91e6;">
                            <iconify-icon icon="tabler:edit"></iconify-icon>
                        </a>
                        <h3>{{$asset->title}}</h3>
                        <a href="{{ route('asset.client', $asset->id) }}" style="color: #3c91e6;">
                            رابط العملاء
                        </a>
                        <div data-toggle="modal" data-target="#addAssetModal">
                            <p> رقم الصك : {{$asset->deed_number}}</p>
                        </div>
                      
                        {{-- <i class='bx bx-filter'></i> --}}
                    </div>
                    <ul class="todo-list">
                        <table class="show_table">
                            <thead>
                                <tr>
                                    {{-- <th>المرفقات</th> --}}
                                    <th>تاريخ البداية</th>
                                    <th>تاريخ الإنتهاء</th>
                                    <th>ملاحظة</th>
                                    <th>آخر تحديث</th>
                                    <th>المكلفين</th>
                                    <th>الإجراء</th>
                                    <th>البيان</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asset->procedures as $procedure)
                                    <tr>
                                        <td>
                                            <p>
                                                {{ Carbon\Carbon::parse($procedure->start_at)->format('Y-m-d') }}
                                            </p>

                                        </td>
                                        <td>
                                            <p>
                                                {{ Carbon\Carbon::parse($procedure->end_at)->format('Y-m-d') }}

                                            </p>
                                            
                                        </td>
                                  
                                        <td>
                                            <p>{{$procedure->notes}}</p>
                                        </td>
                                        <td>
                                            <p>{{$procedure->last_editor}}</p>
                                        </td>
                                        <td>
                                            @foreach($procedure->users as $employee)
                                            <p>
                                                {{$employee->first_name}}   {{$employee->last_name}}
                                            </p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($procedure->status == 0)
                                            لم يبدأ التنفيذ
                                            @elseif ($procedure->status == 1)
                                            تحت المعالجة
                                            @elseif ($procedure->status == 2)
                                            تم الإنجاز
                                            @else
                                            <!-- Handle other statuses here -->
                                            @endif
                                        </td>
                                        <td>
                                            <div style="
                                                display: flex;
                                                justify-content: center;
                                                flex-direction: row-reverse;
                                                gap: 5px;
                                            ">
                                                @if ($procedure->file_name)
                                                <a href="{{ URL::to('/') }}/{{$procedure->file_name}}"
                                                    target="__blank">
                                                    <img style="width:18px;"src="{{ asset('assets/report_d.png')}}" alt="">
                                                    {{-- <label style="color:#3c91e6;"> المرفق</label> --}}
                                                </a>
                                                @endif
                                                <p>{{$procedure->title}}</p>
                                            </div>
                                        </td>
                                   
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{-- <p>{{$procedure->file_name}}</p>  --}}
                    </ul>
                    <div
                    style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    white-space: nowrap;
                    "
                    >
                        <p> المالك : {{$asset->committeeChief?->title}}</p>
                        <div
                        style="
                        white-space: nowrap;
                        display: flex;
                        flex-direction: row-reverse;
                        gap: 10px;
                        "
                        >
                            <p>مدراء المشروع</p>
                            @foreach($asset->users as $project_manager)
                            <p> الاسم: {{$project_manager->first_name}}  {{$project_manager->last_name}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>  
        </div>
    </main>
    <!-- MAIN -->

</x-layout>
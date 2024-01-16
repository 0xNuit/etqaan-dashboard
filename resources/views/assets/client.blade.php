    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <title>إتقان العقارية</title>
</head>
    <!-- MAIN -->
<style>
           table {
                width: 100%;
                border-collapse: collapse;
                margin: 50px 0px;
            }
        
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }
        
            th {
                background-color: var(--light-blue);
            }
        
            tr:nth-child(even) {
                background-color: var(--light-grey);
            }
            .head{
                display: flex;
                justify-content: space-between;
                margin: 20 40;
            }
            .table-data{
                padding: 10px 50px;
            }
</style>
    <main>
        <div class="table-data">
                <div class="todo">
                    <div class="head">
                        <h3>{{$asset->title}}</h3>
                        <div data-toggle="modal" data-target="#addAssetModal">
                            <p> رقم الصك : {{$asset->deed_number}}</p>
                        </div>
                        {{-- <i class='bx bx-filter'></i> --}}
                    </div>
                    <ul class="todo-list">
                        <table>
                            <thead>
                                <tr>
                                    {{-- <th>المرفقات</th> --}}
                                    {{-- <th>تاريخ البداية</th>
                                    <th>تاريخ الإنتهاء</th> --}}
                                    <th>ملاحظة</th>
                                    <th>الإجراء</th>
                                    <th>البيان</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asset->procedures as $procedure)
                                    <tr>
                                        {{-- <td>
                                            <p>
                                                {{ Carbon\Carbon::parse($procedure->start_at)->format('Y-m-d') }}
                                            </p>

                                        </td>
                                        <td>
                                            <p>
                                                {{ Carbon\Carbon::parse($procedure->end_at)->format('Y-m-d') }}

                                            </p>
                                            
                                        </td> --}}
                                  
                                        <td>
                                            <p>{{$procedure->notes}}</p>
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
                    {{-- <div
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
                            <p> الاسم: {{$project_manager->name}}</p>
                            @endforeach
                        </div>
                    </div> --}}
                </div>  
        </div>
    </main>
    <!-- MAIN -->

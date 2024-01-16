    <x-layout>
        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>لوحة التحكم</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">لوحة التحكم</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">الرئيسية</a>
                        </li>
                    </ul>
                </div>
                <div></div>
                {{-- <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">تحميل الموجز</span>
                </a> --}}
            </div>
            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{ count($assets) }}</h3>
                        <p>الأصول</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    
                    <span class="text">
                        <h3>{{ count($committeeChiefs) }}</h3>
                        <p>العملاء</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        @php
                            $count = 0; // Initialize a counter variable
                        @endphp

                        @foreach ($assets as $asset)
                            @if ($asset->status == 2)
                                @php
                                    $count++; // Increment the counter if status is 2
                                @endphp
                            @endif
                        @endforeach
                        <h3>{{ $count }}</h3>
                        <p>الأصول المنجزة</p>
                    </span>
                </li>
            </ul>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>الأصول</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>الإسم</th>
                                <th>تاريخ البدء</th>
                                <th>تاريخ النهاية</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <td>
                                        {{-- <img src="{{ asset('assets/etqaan.png') }}"> --}}
                                        {{-- <p>/p> --}}
                                        <a style="color:grey;" href="{{ route('asset.show', ['id' => $asset->id]) }}">
                                            {{ $asset->title }} 
                                        </a>
                                    </td>
                                    <td>{{ $asset->created_at }}</td>
                                    <td>{{ $asset->end_at }}</td>
                                    <td><span class="status completed">
                                        @if ($asset->status == 0)
                                        تحت العمل
                                        @elseif ($asset->status == 1)
                                            متعذر
                                        @elseif ($asset->status == 2)
                                            منجز
                                        @endif
                                    </span></td>
                                </tr>
                            @endforeach
 
                        </tbody>
                    </table>
                </div>
                <div class="todo">
                    <div class="head">
                        <h3>العملاء</h3>
                        {{-- <i class='bx bx-plus' ></i> --}}
                        <i class='bx bx-filter'></i>
                    </div>
                    <div class="table-data">
                        <div class="order">
                            <ul class="todo-list">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>الإسم</th>
                                            <th>الأصول</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($committeeChiefs as $committeeChief)
                                            <tr>
                                                <td>
                                                    <p>{{ $committeeChief->title }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ count($committeeChief->assets) }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    {{-- <li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li> --}}
                    </ul>
                </div>
            </div>
        </main>
        <!-- MAIN -->

    </x-layout>
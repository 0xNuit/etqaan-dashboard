<x-layout>
    <!-- MAIN -->
 
    <!-- Add Asset Modal -->
    <div class="main_modal" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal fade">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAssetModalLabel">إضافة مدير مشروع</h5>
                    <div type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#addAssetModal">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
                <div class="modal-body">

                    <form class="form_style" method="POST" action="{{ route('project_managers.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">الاسم الاول</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                        </div>
                        <div class="form-group">
                            <label for="name">الاسم الثاني</label>
                            <input type="text" class="form-control" id="father_name" name="father_name">
                        </div>
                        <div class="form-group">
                            <label for="name">الاسم الاخير</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="text" class="form-control" id="password" name="password">
                        </div> --}}
                        <div class="form-group">
                            <label for="phone">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="phone">رقم الهوية</label>
                            <input type="text" class="form-control" id="id_number" name="id_number">
                        </div>
                      
                        
                        <button type="submit" class="btn btn-primary">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <main>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>مدراء المشاريع</h3>
                    <div data-toggle="modal" data-target="#addAssetModal">
                    <span>إضافة مدير مشروع</span>
                    <i class='bx bx-plus' ></i>
                    </div>
                    {{-- <i class='bx bx-filter'></i> --}}
                </div>
         
                
                {{-- <ul class="todo-list">
                    @foreach($project_managers as $project_manager)
                    <li class="completed">
                        <a style="color:grey;">
                            {{ $project_manager->name }} 
                        </a>
                    </li>
                    @endforeach
                </ul> --}}
                <table class="show_table">
                    <thead>
                        <tr>
                           
                            <th>الإجراء</th>
                            <th>رقم الهوية</th>
                            {{-- <th>الإدارة</th>
                            <th>المسمى الموظيفي</th> --}}
                            <th>رقم الجوال</th>
                            {{-- <th>الإيميل</th> --}}
                            <th>الاسم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($project_managers as $project_manager)
                            <tr>
                              
                                <td>
                                    <p>
                                        
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{ $project_manager->id_number }} 
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        {{ $project_manager->phone }} 
                                    </p>
                                </td>
                                {{-- <td>
                                    <p>
                                        {{ $project_manager->email }} 
                                    </p>
                                </td> --}}
                                <td>
                                    <p>
                                        {{ $project_manager->first_name }} {{ $project_manager->last_name }} 
                                    </p>
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
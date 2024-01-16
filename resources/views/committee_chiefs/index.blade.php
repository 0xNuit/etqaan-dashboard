<x-layout>
    <!-- MAIN -->
 
    <!-- Add Asset Modal -->
    <div class="main_modal" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal fade">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAssetModalLabel">إضافة عميل</h5>
                    <div type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#addAssetModal">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
                <div class="modal-body">

                    <form class="form_style" method="POST" action="{{ route('committee_chiefs.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">اسم العميل</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="name">رقم التواصل</label>
                            <input type="text" class="form-control" id="phone" name="phone">
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
                    <h3>العملاء</h3>
                    <div data-toggle="modal" data-target="#addAssetModal">
                    <span>إضافة عميل</span>
                    <i class='bx bx-plus' ></i>
                    </div>
                    {{-- <i class='bx bx-filter'></i> --}}
                </div>
          
                <table class="show_table">
                    <thead>
                        <tr>
                            <th>الإجراء</th>
                            <th>رقم التواصل</th>
                            <th>الاسم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($committeeChiefs as $committeeChief)
                            <tr>
                              
                                <td>
                                    <p>
                                        
                                    </p>
                                </td>
                            
                                <td>
                                    <p>
                                        {{ $committeeChief->phone }} 

                                    </p>
                                </td>
                                
                                <td>
                                    <p>
                                        {{-- {{ $project_manager->first_name }} {{ $project_manager->last_name }}  --}}
                                        {{ $committeeChief->title }} 
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
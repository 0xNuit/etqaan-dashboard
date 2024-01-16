
<x-layout>
 
    <!-- MAIN -->
 
    <!-- Add Asset Modal -->
</div>

    <main>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>الأصول</h3>
                    <div data-toggle="modal" data-target="#addAssetModal">
                    <span>إضافة أصل</span>
                    <i class='bx bx-plus' ></i>
                    </div>
                </div>
         
                
                <ul class="todo-list">
                    @foreach($assets as $asset)
                    <li class="completed">
                        <a style="color:grey;" href="{{ route('asset.show', ['id' => $asset->id]) }}">
                            {{ $asset->title }} 
                        </a>
                    </li>
                    @endforeach
       
                </ul>
            </div>
        </div>
    </main>
    <!-- MAIN -->

</x-layout>

<div class="main_modal" id="addAssetModal" tabindex="-1" role="dialog" aria-labelledby="addAssetModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal fade">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAssetModalLabel">إضافة أصل</h5>
                <div type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#addAssetModal">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
            <div class="modal-body">

                <form class="form_style" method="POST" action="{{ route('asset.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">اسم الأصل</label>
                        <input type="text" class="form-control" id="name" name="name"  >
                    </div>
                    <div class="form-group">
                        <label for="deed_number">رقم الصك</label>
                        <input type="text" class="form-control" id="deed_number" name="deed_number"  required>
                    </div>
                    <div class="form-group">
                        <label for="project_managers">مدراء المشروع</label>
                        <select multiple class="form-control" id="project_managers" name="project_managers[]">
                            @foreach ($projectManagers as $manager)
                                <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="project_managers">المالك</label>
                        <select  class="form-control" id="committee_chief_id" name="committee_chief_id">
                           <!-- Inside the select elements -->
                            @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}">{{ $owner->title }}</option>
                            @endforeach
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label for="procedures">الاجراءات</label>
                        @foreach ($procedureTerms as $term)
                            <div class="procedure-container">
                                <input type="checkbox" name="procedures[{{ $term->id }}][selected]" value="1">
                                <label>{{ $term->term }}</label>
                                <label for="start_at">Start Time</label>
                                <input type="datetime-local" class="form-control" name="procedures[{{ $term->id }}][start_at]">
                                <label for="end_at">End Time</label>
                                <input type="datetime-local" class="form-control" name="procedures[{{ $term->id }}][end_at]">
                    
                                <!-- Include a multiple select for users -->
                                <select multiple class="form-control" name="procedures[{{ $term->id }}][user_ids][]">
                                    @foreach ($projectManagers as $user)
                                        <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    
                    <button type="submit" class="btn btn-primary">إضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>
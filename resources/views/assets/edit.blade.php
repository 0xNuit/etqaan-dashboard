<x-layout>
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
         
      #file-input {
        display: none;
      }

      #file-input-label {
        padding: 2px 3px;
        text-overflow: ellipsis;
        font-size: 10px;
        border: 1px solid black;
        border-radius: 4%;
        overflow: hidden;
        width: 30%;
        display: inline-grid;
    }
         
</style>
    <div class="table-data">
        <div class="todo">
            <div class="head">
            <p>تعديل بيانات </p>    
            <h3>
                {{$asset->title}}</h3>
       
            <div data-toggle="modal" data-target="#addAssetModal">
                <p> رقم الصك : {{$asset->deed_number}}</p>
            </div>
            {{-- <i class='bx bx-filter'></i> --}}
        </div>
        <form method="POST"  enctype="multipart/form-data" action="{{ route('asset.update', $asset->id) }}">
            @csrf
            @method('PUT') <!-- Use the PUT method for updating -->
          
            <ul class="todo-list">
                <table>
                    <thead>
                        <tr>
                            <th style="
                                width: 25%;
                            ">المرفق</th>
                            <th>ملاحظة</th>
                            <th>الإجراء</th>
                            <th>البيان</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asset->procedures as $procedure)
                            <tr>
                                <td>
                                 <input type="file"  id="file-input" name="procedure_files[]" accept=".pdf, .doc, .docx">
                                 @if ($procedure->file_name)
                                 <label id="file-input-label" for="file-input">{{$procedure->file_name}}</label>
                                @else
                                <label id="file-input-label" for="file-input">ارفق ملف</label>
                                @endif
                                </td>
                                <td>
                                    <input type="text" name="procedure_notes[]" value="{{$procedure->notes}}">
                                </td>
                                <td>
                                    <select name="procedure_status[]">
                                        <option value="0" @if($procedure->status == 0) selected @endif>لم يبدأ التنفيذ</option>
                                        <option value="1" @if($procedure->status == 1) selected @endif>تحت المعالجة</option>
                                        <option value="2" @if($procedure->status == 2) selected @endif>تم الإنجاز</option>
                                        <!-- Add more options for other statuses as needed -->
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="procedure_titles[]" value="{{$procedure->title}}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
            <label>حالة المشروع </label>
            <select style="margin: 20px 0px;"name="asset_status">
                <option value="0" @if($asset->status == 0) selected @endif>تحت العمل</option>
                <option value="1" @if($asset->status == 1) selected @endif>متعذر</option>
                <option value="2" @if($asset->status == 2) selected @endif>منجز</option>
                <!-- Add more options for other statuses as needed -->
            </select>
            <div style="display: flex; justify-content: space-between; align-items: center; white-space: nowrap;">
                <p> المالك : {{$asset->committeeChief?->title}}</p>
                <div style="white-space: nowrap; display: flex; flex-direction: row-reverse; gap: 10px;">
                    <p>مدراء المشروع</p>
                    @foreach($asset->users as $project_manager)
                        <p> الاسم: {{$project_manager->name}}</p>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
        </form>
    </div>  
</div>
</x-layout>

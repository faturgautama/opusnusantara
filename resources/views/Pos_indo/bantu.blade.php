
<script src="/stisla/assets/modules/jquery.min.js"></script>

<script>var eq = 0;
        var tampung=[];
</script>
<table class="table table-bordered" id="dynamic_field">
    <tr>
            <td colspan="3">
        <select class="form-control select2" data-placeholder="Pilih Jenis" style="width: 100%;" name="cloth_type_id" id="cloth_type_id">
            <option selected="selected" value="">Pilih Jenis Barang</option>
        @foreach($clothType as $datas)
            <option value="{{$datas['id']}}">{{$datas['name']}}</option>
        @endforeach
        </select>

                <p class="error text-center alert alert-danger hidden"></p></td>
        </tr>

        <tr>
            <td colspan="3"><select class="form-control" style="width: 100%;" name="unit" id="unit">
                    <option value="">Pilih Satuan</option>
                    <option value="Kg">Kg</option>
                    <option value="Yard">Yard</option>
                </select></td>
        </tr>
    <tr id="row">
        {{csrf_field()}}
        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
    </tr>
</table>
<script src="/js/axios.js"></script>
<script>
var index = 0;
    $(document).ready(function(){        
        $('#add').click(function(){
            axios.get('/api/bantu/'+index)
            .then(function (response) {
                // opsi = response.data;
                $('#dynamic_field').append(response.data);
            });
            eq++;  
        });
    });
</script>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Income</h4>
                    <h5 id="income"></h5>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">New Income</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Income</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
   getList();
   async function getList() {
    showLoader();
    let res = await axios.get("/list-income");
    hideLoader();

    let tableList = $('#tableList')
    let tableData = $('#tableData')

    tableData.DataTable().destroy();
    tableList.empty();

    let totalIncome = 0;
    res.data.forEach((item, index) => {
        let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['amount']}</td>
                    <td>${item['description']}</td>
                    <td>${item['date']}</td>
                    <td>${item['category']}</td>
                    <td>
                        <button data-id="${item['id']}" class ="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class ="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                </tr>`
        tableList.append(row)
        totalIncome += parseFloat(item['amount']);
    })

    let income = document.getElementById("income");
     income.style.color = '#8bc34a';
     income.textContent=`Your total income is:  ${totalIncome} BDT`;


    $('.editBtn').on('click', async function() {
        let id = $(this).data('id');
        await FillUpUpdatedForm(id);
         $('#update-modal').modal('show');
    })

    $('.deleteBtn').on('click', function(){
        let id = $(this).data('id');
        $('#delete-modal').modal('show');
        $('#deleteID').val(id);
    })
    
     new DataTable('#tableData', {
        order:[[0,'desc']],
        lengthMenu:[5,10,100]
     });

    }
</script>

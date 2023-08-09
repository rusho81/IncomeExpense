<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Expense</h4>
                    <h5 id="expense"></h5>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-sm bg-gradient-primary">New Expense</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Expense</th>
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
    let res = await axios.get("/list-expense");
    hideLoader();

    let tableList = $('#tableList')
    let tableData = $('#tableData')

    tableData.DataTable().destroy();
    tableList.empty();

    let totalExpenses = 0;
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
        totalExpenses += parseFloat(item['amount']);
    })

     let expense = document.getElementById("expense");
     expense.style.color = '#f44336';
     expense.textContent=`Your total expenses is:  ${totalExpenses} BDT`;


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

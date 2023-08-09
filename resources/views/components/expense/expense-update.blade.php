<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" id="updateExpenseAmount">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="updateExpenseDescription">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="updateExpenseDate">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="updateExpenseCategory">
                                <input class="" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn btn-sm  btn-success" >Update</button>
            </div>
        </div>
    </div>
</div>
<script>

    async function FillUpUpdatedForm(id) {
        document.getElementById("updateID").value=id;
        showLoader();
        let res = await axios.post('/expense-by-id', {id:id});
        hideLoader();
        document.getElementById("updateExpenseAmount").value=res.data['amount'];
        document.getElementById("updateExpenseDescription").value=res.data['description'];
        document.getElementById("updateExpenseDate").value=res.data['date'];
        document.getElementById("updateExpenseCategory").value=res.data['category'];
    }
    async function Update() {
        var expenseAmount = document.getElementById("updateExpenseAmount").value;
        var expenseDescription = document.getElementById("updateExpenseDescription").value;
        var expenseDate = document.getElementById("updateExpenseDate").value;
        var expenseCategory = document.getElementById("updateExpenseCategory").value;
        var updateId = document.getElementById("updateID").value;

        if(expenseAmount.length === 0){
            errorToast("Amount Required!");
        }else if(expenseDescription.length === 0){
            errorToast("Description Required!");
        }else if(expenseDate.length === 0){
            errorToast("Date Required!");
        }else if(expenseCategory.length === 0){
            errorToast("Category Required!");
        }else {
            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post('/update-expense', {
                amount:expenseAmount,
                description:expenseDescription,
                date:expenseDate,
                category:expenseCategory,
                id:updateId});
            hideLoader();

            if(res.status===200 && res.data===1){
                successToast("Update Successfull");
                await getList();
            }else{
                errorToast("Update Failed");
            }
        }
    }
</script>
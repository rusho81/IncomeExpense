<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Income</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" id="updateIncomeAmount">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="updateIncomeDescription">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="updateIncomeDate">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="updateIncomeCategory">
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
        let res = await axios.post('/income-by-id', {id:id});
        hideLoader();
        document.getElementById("updateIncomeAmount").value=res.data['amount'];
        document.getElementById("updateIncomeDescription").value=res.data['description'];
        document.getElementById("updateIncomeDate").value=res.data['date'];
        document.getElementById("updateIncomeCategory").value=res.data['category'];
    }
    async function Update() {
        var incomeAmount = document.getElementById("updateIncomeAmount").value;
        var incomeDescription = document.getElementById("updateIncomeDescription").value;
        var incomeDate = document.getElementById("updateIncomeDate").value;
        var incomeCategory = document.getElementById("updateIncomeCategory").value;
        var updateId = document.getElementById("updateID").value;

        if(incomeAmount.length === 0){
            errorToast("Amount Required!");
        }else if(incomeDescription.length === 0){
            errorToast("Description Required!");
        }else if(incomeDate.length === 0){
            errorToast("Date Required!");
        }else if(incomeCategory.length === 0){
            errorToast("Category Required!");
        }else {
            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post('/update-income', {
                amount:incomeAmount,
                description:incomeDescription,
                date:incomeDate,
                category:incomeCategory,
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
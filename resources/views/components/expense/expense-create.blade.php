<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Expense</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" id="expenseAmount">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="expenseDescription">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="expenseDate">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="expenseCategory">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>
    async function Save() {
        let expenseAmount = document.getElementById('expenseAmount').value;
        let expenseDescription = document.getElementById('expenseDescription').value;
        let expenseDate = document.getElementById('expenseDate').value;
        let expenseCategory = document.getElementById('expenseCategory').value;

        if(expenseAmount.length === 0){
            errorToast("Amount Required!");
        }else if(expenseDescription.length === 0){
            errorToast("Description Required!");
        }else if(expenseDate.length === 0){
            errorToast("Date Required!");
        }else if(expenseCategory.length === 0){
            errorToast("Category Required!");
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post('/create-expense', {
                amount:expenseAmount,
                description:expenseDescription,
                date:expenseDate,
                category:expenseCategory
            });
            hideLoader();
            if(res.status===201) {
                successToast('Request completed!');
                document.getElementById('save-form').reset();
                await getList();
            }else {
                errorToast("Request fail");
            }
        }
    }
</script>

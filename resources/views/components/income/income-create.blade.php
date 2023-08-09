<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Income</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" id="incomeAmount">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" id="incomeDescription">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" id="incomeDate">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="incomeCategory">
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
        let incomeAmount = document.getElementById('incomeAmount').value;
        let incomeDescription = document.getElementById('incomeDescription').value;
        let incomeDate = document.getElementById('incomeDate').value;
        let incomeCategory = document.getElementById('incomeCategory').value;

        if(incomeAmount.length === 0){
            errorToast("Amount Required!");
        }else if(incomeDescription.length === 0){
            errorToast("Description Required!");
        }else if(incomeDate.length === 0){
            errorToast("Date Required!");
        }else if(incomeCategory.length === 0){
            errorToast("Category Required!");
        }
        else {
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post('/create-income', {
                amount:incomeAmount,
                description:incomeDescription,
                date:incomeDate,
                category:incomeCategory
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

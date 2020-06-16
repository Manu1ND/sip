$(document).ready(function () {
	$("#search-TT").on('click', '#editButton', function () {
		var $row = $(this).parents('tr');
		var date = encodeURIComponent($row.find('td:eq(0)').html());
		var sessNO = encodeURIComponent($row.find('td:eq(1)').html());
		const editSession = document.getElementById('editSession');
		var video = data[date][sessNO]['video'];
		var feedback = data[date][sessNO]['feedback'];

		var html = `
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editSessionTitle">Edit Session</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
                        <form id="editSessionForm" class="login100-form validate-form" action="timetable/editSession.php" method="POST" enctype="multipart/form-data" style="padding-bottom:0%" novalidate>
                        
							<div class="wrap-input200 validate-input m-b-26">
                                <button name="deleteSession" class="login100-form-btn">
                                    Delete Session
                                </button>
                            </div>
							<div class="wrap-input200 validate-input m-b-26">
                                <h5 class="modal-title">Date: `+ date + `</h5>
                                <input type="hidden" name="newDate" value="`+ date + `"/>
							</div>

							<div class="wrap-input200 validate-input m-b-26">
                                <h5 class="modal-title">Session No: `+ sessNO + `</h5>
							</div>
                            <input type="hidden" name="newSessNO" value="`+ sessNO + `"/>

							<div class="wrap-input100 validate-input m-b-26" data-validate="Video URL is required">
								<span class="label-input100">Video</span>
								<input class="input100" type="url" name="newVideo" id="newVideo" placeholder="`+ video + `">
								<span class="focus-input100"></span>
							</div>

							<div class="wrap-input100 validate-input m-b-26" data-validate="Feedback URL is required">
								<span class="label-input100">Feedback</span>
								<input class="input100" type="url" name="newFeedback" id="newFeedback" placeholder="`+ feedback + `">
								<span class="focus-input100"></span>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" name="editSessionSubmit" class="btn btn-primary" form="editSessionForm">Edit</button>
					</div>
				</div>
            </div>`;

		editSession.innerHTML = html;
	});
});
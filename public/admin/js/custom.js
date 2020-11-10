

$(document).ready(function(){
var chapters = [];
	//jQuery Data tables
	$('.data_table_apply').DataTable();
	$('#userTable').DataTable();
	$('#activityTable').DataTable({
		"order": [[ 3, "desc" ]]
	});
	$("#subjectTable").DataTable();
	$(".data_table_apply").DataTable();

	//Permission Addition to Role Ajax request
	$(".permission").on("change", function(e){
		e.preventDefault();

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).find(':selected').data('url'),
			data: {'role_id':$(this).find(':selected').data('role'), 'permission_id':$(this).val()},
			success: function(data){
				console.log(data);
				if(data.status==200){
					toastr.success(data.msg);

					setTimeout(function(){
						location.reload();
					}, 1200);

				}else if(data.status=202){
					toastr.warning(data.msg);
				}else if(data.status=204){
					toastr.error(data.msg);
				}
			},
			error: function(data){
				toastr.error("Something went wrong, Please Try again.");
			}
		});

	});

	//deleting permission from ajax
	$(".permissionDel").on("click", function(e){
		e.preventDefault();

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).data('url'),
			data: {'role_id':$(this).data('role'), 'permission_id':$(this).val()},
			success: function(data){
				console.log(data);
				if(data.status==200){
					toastr.success(data.msg);

					setTimeout(function(){
						location.reload();
					}, 1200);

				}else if(data.status=204){
					toastr.error(data.msg)
				}
			},
			error: function(data){
				toastr.error("Something went wrong, Please Try again.");
			}
		});

	});

	/* Add Todo Task */
	$("#addTask, #editTask").on("submit", function(e){
		e.preventDefault();

		console.log(e.target.id);
		console.log();

		//return false;


		if(e.target.id == 'addTask'){
			//add Task
			var taskName = $('#taskName').val();
			data = {'taskName': taskName };

		}else if(e.target.id == 'editTask'){
			//edit Task
			var taskName = $('#taskNameEdit').val();
			//;
			data = {'taskName': taskName, 'taskEditId': $(this).closest('div').find("#taskEditId").val() };
		}


		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: data,
			success: function(data){
				console.log(data);
		  	//$('#addTask').modal('toggle');

		  	if(data.status==200){

		  		toastr.success(data.msg);

		  		if(e.target.id == 'addTask'){
		  			$("#myModalNorm").modal('toggle');

		  			setTimeout(function(){
		  				location.reload();
		  			}, 600);

		  		}else if(e.target.id == 'editTask'){
		  			$("#myModalNormEdit").modal('toggle');

		  			setTimeout(function(){
		  				location.reload();
		  			}, 600);

		  		}


		  	}else if(data.status=202){
		  		toastr.error(data.msg)
		  	}
		  },
		  error: function(data){
		  	toastr.error("Something went wrong, Please Try again.");
		  }
		});
	});

	$(".todoEdit").on('click', function(e){
		e.preventDefault();
		var taskId = $(this).data('id');

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "GET",
			url: $(this).data('url'),
			data: {'taskId': taskId },
			success: function(data){
				console.log(data);
		  	// $('#addTask').modal('toggle');
		  	$("#taskNameEdit").val(data.task);
		  	$("#taskEditId").val(data.id);
		  },
		  error: function(data){
		  	toastr.error("Something went wrong, Please Try again.");
		  }
		});

	});

	/* Delete Todo */
	$(".todoDel").on('click', function(e){
		e.preventDefault();
		var taskId = $(this).data('id');

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).data('url'),
			data: {'taskId': taskId },
			success: function(data){
				console.log(data);
		  	// $('#addTask').modal('toggle');

		  	if(data.status==200){
		  		toastr.success(data.msg);
		  		//$(this).closest('.liTodo').hide();
		  		setTimeout(function(){
		  			location.reload();
		  		}, 500);

		  	}else if(data.status=202){
		  		toastr.error(data.msg)
		  	}

		  },
		  error: function(data){
		  	toastr.error("Something went wrong, Please Try again.");
		  }
		});

	});


	$(".toDoCheck").change(function() {

		var status;
		if(this.checked) {
			status = 1;
			$(this).siblings('span.text').css('text-decoration', 'line-through');
			$(this).siblings('span.text').css('color', '#c9cbcf');
			$(this).closest('li').find('.label-success').css('background-color', 'rgb(201, 203, 207)');
		}
		else{
			status = 0;
			$(this).siblings('span.text').css('text-decoration', 'none');
			$(this).siblings('span.text').css('color', '#000');
			$(this).closest('li').find('.label-success').css('background-color', '#00a65a');
		}

		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).data('url'),
			data: {'taskId': $(this).data('id'), 'checked' : status},
			success: function(data){
				console.log(123);
				console.log(data);
		  	// $('#addTask').modal('toggle');

		  	if(data.status==200){
		  		toastr.success(data.msg);
		  	}else if(data.status=202){
		  		toastr.error(data.msg)
		  	}

		  },
		  error: function(data){
		  	toastr.error("Something went wrong, Please Try again.");
		  }
		});
	});


	/* Subject handling Jquery */

	$(".editAddSubjectModal").on("click", function(e){
		e.preventDefault();

	 //for edit
	 if($(this).data('flag') == 'edit'){
	 	//Send Ajax request to get data and insert in model.
	 	var subjId = $(this).data('id');

	 	$.ajaxSetup({
	 		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
	 	});

	 	$.ajax({
	 		type: "POST",
	 		url: $(this).data('url'),
	 		data: {'subjId': $(this).data('id') },
	 		success: function(data){
	 			$("#subject").val(data.subject);
	 			$("#subject_code").val(data.subject_code);
	 			$("#edit_subj_id").val(subjId);
	 			$(".subjModalHeading").text('Edit');
	 		},
	 		error: function(data){
	 			toastr.error("Subject couldnot be Loaded.");
	 		}
	 	});

		 //for add
		}else if($(this).data('flag') == 'add'){
			$("#subject").val('');
			$("#subject_code").val('');
			$("#edit_subj_id").val('');
			$(".subjModalHeading").text('Add');
		}
	});
	
	/* Chapter handling Jquery */

	$(".editAddChapterModal").on("click", function(e){
		e.preventDefault();

	 //for edit
	 if($(this).data('flag') == 'edit'){
	 	//Send Ajax request to get data and insert in model.
	 	var subjId = $(this).data('id');

	 	$.ajaxSetup({
	 		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
	 	});

	 	$.ajax({
	 		type: "POST",
	 		url: $(this).data('url'),
	 		data: {'chapterId': $(this).data('id') },
	 		success: function(data){
	 		    console.log(data,'data');
	 			$("#grade").val(data.grade_id);
	 			$("#chapter_name").val(data.chapter_name);
	 			$("#edit_subj_id").val(subjId);
	 			$(".subjModalHeading").text('Edit');
	 		},
	 		error: function(data){
	 			toastr.error("Subject couldnot be Loaded.");
	 		}
	 	});

		 //for add
		}else if($(this).data('flag') == 'add'){
			$("#subject").val('');
			$("#subject_code").val('');
			$("#edit_subj_id").val('');
			$(".subjModalHeading").text('Add');
		}
	});

	/* Job Request handling Jquery */

	$(".editAddJobRequestModal").on("click", function(e){
		e.preventDefault();

	 //for edit
	 if($(this).data('flag') == 'edit'){
	 	//Send Ajax request to get data and insert in model.
	 	var subjId = $(this).data('id');

	 	$.ajaxSetup({
	 		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
	 	});

	 	$.ajax({
	 		type: "POST",
	 		url: $(this).data('url'),
	 		data: {'jobRequestId': $(this).data('id') },
	 		success: function(data){
	 			$("#title").val(data.subject);
	 			$("#details").val(data.subject_code);
	 			$("#description").val(data.subject_code);
	 			$("#first_name").val(data.subject_code);
	 			$("#last_name").val(data.subject_code);
	 			$("#jobRequest_Id").val(jobRequestId);
	 			$(".subjModalHeading").text('Edit');
	 		},
	 		error: function(data){
	 			toastr.error("Subject couldnot be Loaded.");
	 		}
	 	});

	 //for add
	}
	// else if($(this).data('flag') == 'add'){
	// 	$("#subject").val('');
	// 	$("#subject_code").val('');
	// 	$("#edit_subj_id").val('');
	// 	$(".subjModalHeading").text('Add');
	// }

	});

	//editAddSubject
	$("#editAddSubject").on('submit', function(e){
		e.preventDefault();

		var formData = new FormData(this);
		console.log(formData);
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: formData,
			processData: false,
			contentType: false,
			success: function(data){

				if(data.success == true){
					toastr.success(data.msg);

					$("#editAddSubjectModal").modal('toggle');

					setTimeout(function(){
						location.reload();
					}, 600);

				}else if(data.success == false){
					toastr.success(data.msg);
				}
			},
			error: function(data){
				toastr.error(data.msg);
			}
		});
	});

	//hasan mehdi
	$("#editAddGrade").on('submit', function(e){
		e.preventDefault();

		var formData = new FormData(this);
		console.log(formData);
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).attr('action'),
			data: formData,
			processData: false,
			contentType: false,		  
			success: function(data){

				if(data.success == true){
					toastr.success(data.msg);
					
					$("#editAddGradeModal").modal('toggle');

					setTimeout(function(){ 
						location.reload();
					}, 600);

				}else if(data.success == false){
					toastr.success(data.msg);
				}
			},
			error: function(data){
				toastr.error(data.msg);
			}
		});
	});

	//hasan mehdi
	$(".editAddGradeModal").on("click", function(e){
		e.preventDefault();

	 //for edit
	 if($(this).data('flag') == 'edit'){
	 	//Send Ajax request to get data and insert in model.
	 	var gradeid = $(this).data('id');

	 	$.ajaxSetup({
	 		headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
	 	});

	 	$.ajax({
	 		type: "POST",
	 		url: $(this).data('url'),
	 		data: {'gradeid': $(this).data('id') },
	 		success: function(data){
	 			$("#grade").val(data.grade);
	 			$("#grade_description").val(data.grade_description);
	 			$("#edit_grade_id").val(gradeid);
	 			$(".gradeModalHeading").text('Edit');
	 		},
	 		error: function(data){
	 			toastr.error("Subject couldnot be Loaded.");
	 		}
	 	});

		 //for add
		}else if($(this).data('flag') == 'add'){
			$("#grade").val('');
			$("#grade_description").val('');
			$("#edit_grade_id").val('');
			$(".gradeModalHeading").text('Add');
		}
	});

	$("#add_question").on('click', '.add_newquestion', function() {
		var question_count = 1;
		$('#add_question>.row').each(function () {
			question_count++;
			$("#ques_count").val(question_count);
		});
		
		var chapterOptions = '';
		$.each(chapters,function(index,item){
		    console.log(item);
		    chapterOptions = chapterOptions + '<option value="'+item.id+'">'+item.chapter_name+'</option>';
		});

		$(this).closest('#add_question').append('<div class="row question">'+
			'<div class="col-md-12">'+
				'<div class="form-group profile_form">'+
					'<label for="q'+question_count+'">Question '+question_count+'<span>*</span></label>'+
					'<textarea id="q'+question_count+'" name="q'+question_count+'[]" rows="8" class="form-control ckeditor" required></textarea>'+
				'</div>'+
				'<div class="form-group profile_form">'+
                  '<label for="grade">Chapter<span>*</span></label>'+
                  '<select name="chapter_id[]" class="form-control add_more_chapter" required>'+                    
                           '<option value="">Select Chapter</option>'+chapterOptions
+                  '</select>'+
                '</div>'+
				'<div class="form-group profile_form add_answer">'+
					'<div class="row">'+
						'<div class="col-md-8">'+
							'<label>Answer (Check the correct answer)</label>'+
							'<label class="pull-right add_mcqs">Add More</label>'+
						'</div>'+
					'</div>'+
					'<div class="row">'+
						'<div class="col-md-8 mcq_blank">'+
							'<label class="mcqs_label">1.</label>'+
							'<input type="text" name="q'+question_count+'[]" class="form-control mcqs_answer_add mcqs_answer">'+
							'<div class="mcqs_check_add">'+
								'<i class="fa fa-times-circle-o fa-lg"></i>'+
								'<input type="radio" name="q'+question_count+'_check" class="ques_check" value="1">'+
							'</div>'+
						'</div>'+
					'</div>'+

					'<div class="row">'+
						'<div class="col-md-8 mcq_blank">'+	
							'<label class="mcqs_label">2.</label>'+
							'<input type="text" name="q'+question_count+'[]" class="form-control mcqs_answer_add mcqs_answer">'+
							'<div class="mcqs_check_add">'+
								'<i class="fa fa-times-circle-o fa-lg"></i>'+
								'<input type="radio" name="q'+question_count+'_check" class="ques_check" value="2">'+
							'</div>'+
						'</div>'+
					'</div>'+					
				'</div>'+
			'</div>'+
		'</div>');
		//$( 'textarea.ckeditor' ).ckeditor();
		//$('.ckeditor').ckeditor();
		CKEDITOR.replace('q'+question_count+'');
	});
	$("#add_question").on('click', '.add_mcqs', function() {
		var colCount = 0;
		var loop = $(this).closest('.add_answer').find('.row');
		loop.each(function () {
      		colCount++;
    	});
		var q = $(this).closest('.question').find('textarea').attr('id');
		$(this).closest('.add_answer')
		.append('<div class="row">'+
        '<div class="col-md-8">'+
          '<label class="mcqs_label">'+colCount+'.</label>'+
          '<input type="text" name="'+q+'[]" class="form-control mcqs_answer_add">'+
          '<div class="mcqs_check_add">'+
            '<i class="fa fa-times-circle-o fa-lg"></i>'+
            '<input type="radio" name="'+q+'_check" value="'+colCount+'">'+
          '</div>'+
        '</div>'+
      '</div>'
		);
	});

	$(".ques_check").on('click', function(e){
		console.log(123);
		console.log( $(this).closest(".mcq_blank").find('.mcqs_answer').val() );
	});

	//Get Grade subjects
	$("#grade").on("change", function(e){
		e.preventDefault();
		
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).data('url'),
			data: {'id': $(this).val()},
			success: function(data){
				console.log(data);
				$("#subject").html(data.html);
			},
			error: function(data){
				toastr.error("Something went wrong, Please Try again.");
			}
		});

	});
	
	
	//Get Subject chapters
	$("#subject").on("change", function(e){
		e.preventDefault();
		
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
		});

		$.ajax({
			type: "POST",
			url: $(this).data('url'),
			data: {'id': $(this).val()},
			success: function(data){
			    chapters = data.chapters;
				$("#chapter_id").html(data.html);
			},
			error: function(data){
				toastr.error("Something went wrong, Please Try again.");
			}
		});

	});

	$('.deleteGroup').on('click',function(e){
        if(!confirm('Do you want to delete this Job?')){
              e.preventDefault();
        }
  });

});


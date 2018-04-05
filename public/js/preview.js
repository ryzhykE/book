
function send() {
    var title = $('#inp-title').val();
    var message = $('#inp-desc').val();
    var text = $('#inp-subj').val();
    var file = $('#files').val();
        $.ajax({
            url: '/admin/addpost',
            type: 'post',
            timeout: 1000,
            data: {'title': title, 'message': message, 'email':email, 'file':file},
            success: function(data) {
                alert(data);
                document.getElementById('message').value = "";
                $('#send_message_result').html("Message add !");
            },
            error: function() {
                alert(data);
                $('#send_message_result').html("Comment no add");
            }
        });
}


$("#preview-butt").click(function () {
		$('#prev-title').html('Title: ' + $('#inp-title').val());
		$('#prev-desc').html('Description: ' + $('#inp-desc').val());
		$('#prev-subj').html('<b>Text: </b>' + $('#inp-subj').val());
		$('#preview').show();
		$('#form').hide();
});
$("#show-form").click(function () {
		$('#preview').hide();
		$('#form').show();
});

$("#file-reset").click(function () {
    $('#files').val("");
	$('#preview_1').css('background-image', '');
});


function previewFile() {
  var preview = document.querySelector('#prev-img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}


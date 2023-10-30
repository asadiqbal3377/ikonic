<script>
    $('#comment-form').submit(function(event) {
      event.preventDefault();
  
      var data = {
          body: $('#comment-form textarea').val()
      };
  
      $.ajax({
          url: "{{route('feedback.comment',$feedback->id)}}",
          method: 'POST',
          data: data,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            console.log(response);
              // Append the new comment to the list of comments.
              var commentData = response;
              var commentHtml =
                  '<li class="list-group-item m-1">' +
                '<p> <span class="user-icon "><i class="fa fa-user"></i></span><b>' + commentData.user.name + '</b></p>' +
                '<p>' +  commentData.body + '</p>' +
              '</li>';
  
              $('.comments').append(commentHtml);
              $('.comments-counter').text(`(${response.comments})`)
              // Clear the comment form.
              $('#comment-form textarea').val('');
          }
      });
  });
  
  </script>
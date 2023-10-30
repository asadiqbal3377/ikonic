<script>
  function vote(id){
  
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('vote.store') }}", // Use Blade syntax to get the route
      method: 'POST',
      data: { id: id }, // Pass data as an object
      success: function(response) {
        console.log(response);
        if (response.status == 1) {
          $('.vote-icon').addClass('heart');
        }
        if (response.status == 0) {
          $('.vote-icon').removeClass('heart');
        }
  
        $('.vote-count').text(response.vote);
      }
    });
  }
  </script>
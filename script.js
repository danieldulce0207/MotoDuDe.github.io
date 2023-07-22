
function handleProductClick(productId) {
    // Perform actions when the product is clicked
    console.log("Product clicked: " + productId);
}

function redirectToProduct(productId) {
    // Construct the URL for the product page
    var productUrl = 'product_page.php?id=' + productId;
  
    // Redirect to the product page
    window.location.href = productUrl;

}

//product-page script
$(document).ready(function() {
    // Handle increment button click
    $('#incrementBtn').click(function() {
      var currentValue = parseInt($('#quantityInput').val());
      $('#quantityInput').val(currentValue + 1);
    });
  
    // Handle decrement button click
    $('#decrementBtn').click(function() {
      var currentValue = parseInt($('#quantityInput').val());
      if (currentValue > 1) {
        $('#quantityInput').val(currentValue - 1);
      }
    });
  });

$(document).ready(function() {
    $('#addtocartBtn').click(function() {
        location.reload(); // Refresh the page
    });
});

$(document).ready(function() {
  $('#removeFromCartBtn').click(function() {
      location.reload(); // Refresh the page
  });
});

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

var closeBtn = document.getElementById("closeBtn");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

closeBtn.onclick = function() {
  modal.style.display = "none";
  destroySession();
  window.location.href = 'index.php';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    destroySession();
    window.location.href = 'index.php';
  }
}

function destroySession() {
  $.ajax({
    url: 'destroy_session.php',
    method: 'POST',
    success: function(data) {
      console.log('Session destroyed successfully.');
      // Perform any other actions after session destruction if needed.
    },
    error: function() {
      console.error('Failed to destroy session.');
    }
  });
}

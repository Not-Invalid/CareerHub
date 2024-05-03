function createPagination(totalPages, currentPage) {
  var paginationContainer = document.querySelector('.pagination');
  paginationContainer.innerHTML = '';

  var paginationHTML = '';

  paginationHTML += '<button onclick="changePage(' + (currentPage > 1 ? currentPage - 1 : 1) + ')"><i class="fas fa-chevron-left btn-prev"></i></button>';
  
  for (var i = 1; i <= totalPages; i++) {
      paginationHTML += '<button class="' + (currentPage === i ? 'active' : '') + '" onclick="changePage(' + i + ')">' + i + '</button>';
  }
  
  paginationHTML += '<button onclick="changePage(' + (currentPage < totalPages ? currentPage + 1 : totalPages) + ')"><i class="fas fa-chevron-right btn-next"></i></button>';

  paginationContainer.innerHTML = paginationHTML;
}

function changePage(page) {
  var url = window.location.href.split('?')[0];
  var searchParams = new URLSearchParams(window.location.search);

  searchParams.set('page', page);
  window.location.href = url + '?' + searchParams.toString();
}

window.addEventListener('DOMContentLoaded', function() {
  var paginationContainer = document.querySelector('.pagination');
  var totalPages = paginationContainer.getAttribute('data-totalpages');
  var currentPage = paginationContainer.getAttribute('data-currentpage');

  createPagination(totalPages, currentPage);
});


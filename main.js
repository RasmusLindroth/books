 function loadJSON(callback) {   

    var xobj = new XMLHttpRequest();
    xobj.overrideMimeType("application/json");
    xobj.open('GET', './books.json', true);
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            callback(xobj.responseText);
          }
    };
    xobj.send(null);  
 }

var books = [];

loadJSON(function(response) {
    books = JSON.parse(response);
    ready();
});

function ready() {
    var bookContainer = document.getElementById('books-body');
    for(var i = 0; i < books.length; i++) {

        let container = document.createElement('tr');
        container.className = 'book-tr';

        container.dataset.id = i;

        let title = document.createElement('td');
        title.className = 'book-title';
        title.innerText = (books[i].title !== null) ? books[i].title : '-';

        let author = document.createElement('td');
        author.className = 'book-author';
        author.innerText = (books[i].creator !== null) ? books[i].creator : '-';


        let publisher = document.createElement('td');
        publisher.className = 'book-publisher';
        publisher.innerText = (books[i].publisher !== null) ? books[i].publisher : '-';

        container.appendChild(title);
        container.appendChild(author);
        container.appendChild(publisher);

        container.addEventListener('click', function(event) {
            bookDetail(event.currentTarget.dataset.id);
        }, true);

        bookContainer.appendChild(container);
    }
}

function bookDetail(i) {
    document.getElementById('book-title').innerText = (books[i].title !== null) ? books[i].title : '-';
    document.getElementById('book-author').innerText = (books[i].creator !== null) ? books[i].creator : '-';
    document.getElementById('book-publisher').innerText = (books[i].publisher !== null) ? books[i].publisher : '-';
    document.getElementById('book-lang').innerText = (books[i].language !== null) ? books[i].language : '-';
    document.getElementById('book-desc').innerText = (books[i].description !== null) ? books[i].description : '-';
    document.getElementById('book-download').href = 'download.php?id=' + i;
    document.getElementById('book-img').src = (books[i].imgPath !== null) ? books[i].imgPath : '';
}
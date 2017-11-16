<!DOCTYPE html>
<html lang="sv">
    <head>
        <title>Böcker</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./style.css" rel="stylesheet">
    </head>
    <body>
        <main>
            <div id="books-container">
                <table id="books">
                    <thead>
                        <tr>
                            <th>Titel</th>
                            <th>Författare</th>
                            <th>Förlag</th>
                        </tr>
                    </thead>
                </table>
                <div id="books-body-container">
                    <table>
                            <tbody id="books-body">
                            </tbody>
                    </table>
                </div>
            </div>
            <div id="book-detail">
                <h1 id="book-title">Titel</h1>
                <h2 id="book-author">Författare</h2>
                <img width="150px" id="book-img">
                <p>Förlag: <span id="book-publisher"></span></p>
                <p>Språk: <span id="book-lang"></span></p>
                <p><a id="book-download" href="" target="_blank">Ladda ner</a></p>
                <h3>Bokbeskrivning</h3>
                <p id="book-desc"></p>
            </div>
        </main>
        <script src="./main.js"></script>
    </body>
</html>
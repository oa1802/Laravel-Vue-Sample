<template>
    <table id="selected-books" class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Inventory</th>
            <th>Quantity</th>
        </tr>
    </table>
</template>

<script>
export default {
    props: ['books', 'selected_book_quantities'],
    mounted () {
        var booksJSON = eval(this.books);
        var selected_book_quantitiesJSON = eval('(' + this.selected_book_quantities + ')');
        var total_price = 0;
        booksJSON.forEach(book => {
            var tableRow = document.createElement('tr');

            var title = document.createElement('td');
            title.appendChild(document.createTextNode(book['title']));
            tableRow.appendChild(title);

            var author = document.createElement('td');
            author.appendChild(document.createTextNode(book['author']));
            tableRow.appendChild(author);

            var price = document.createElement('td');
            price.appendChild(document.createTextNode('$' + book['price']));
            tableRow.appendChild(price);

            var inventory = document.createElement('td');
            inventory.appendChild(document.createTextNode(book['inventory']));
            tableRow.appendChild(inventory);

            var quantity = document.createElement('td');
            quantity.appendChild(document.createTextNode(selected_book_quantitiesJSON[book['id']]));
            tableRow.appendChild(quantity);
            total_price += Number(book['price'] * selected_book_quantitiesJSON[book['id']]);

            document.getElementById('selected-books').appendChild(tableRow);
        });
        var tableRow = document.createElement('tr');
        tableRow.appendChild(document.createElement('td'));
        tableRow.appendChild(document.createElement('td'));
        tableRow.appendChild(document.createElement('td'));
        tableRow.appendChild(document.createElement('td'));
        var total = document.createElement('td');
        var h4 = document.createElement('h4');
        h4.appendChild(document.createTextNode('$' + total_price.toFixed(2)));
        total.appendChild(h4);
        tableRow.appendChild(total);
        document.getElementById('selected-books').appendChild(tableRow);
    }
}
</script>

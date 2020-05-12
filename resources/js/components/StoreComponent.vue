<template>
    <div>
        <table id= "books-store" class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Inventory</th>
                <th>Quantity</th>
            </tr>
        </table>
        <input class="small_button" type="submit" value="Purchase">
    </div>
</template>

<script>
export default {
    props: ['books'],
    mounted () {
        var booksJSON = eval(this.books);
        var count = 1;
        booksJSON.forEach(book => {
            var tableRow = document.createElement('tr');

            var title = document.createElement('td');
            title.appendChild(document.createTextNode(book['title']));
            tableRow.appendChild(title);

            var author = document.createElement('td');
            author.appendChild(document.createTextNode(book['author']));
            tableRow.appendChild(author);

            var price = document.createElement('td');
            price.appendChild(document.createTextNode(book['price']));
            tableRow.appendChild(price);

            var inventory = document.createElement('td');
            inventory.appendChild(document.createTextNode(book['inventory']));
            tableRow.appendChild(inventory);

            var number = document.createElement('td');
            var input = document.createElement('input');
            input.type = 'number';
            input.className = 'number-input';
            input.name = count;
            input.value = 0;
            input.min = 0;
            input.max = book['inventory'];
            number.appendChild(input);
            tableRow.appendChild(number);

            document.getElementById('books-store').appendChild(tableRow);
            count++;
        });
    }
}
</script>

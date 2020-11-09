Products

<?php
// echo "<pre>";
// print_r($products);
?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
    </thead>

    <tbody>
        <?php if(!empty($products)): ?>
            <?php foreach ($products as $product): ?>
            <tr>
            
                <th>{{$product->name}}</th>
                <th>{{$product->description}}</th>
                <th>{{$product->price}}</th>
                <!-- <th>{{$product->created_at}}</th>    -->
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
  
</table>
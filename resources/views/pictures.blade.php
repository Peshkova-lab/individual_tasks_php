@extends("layout")

@section("app-title")
    Pictures
@endsection

@section("page-title")
    Home page
@endsection

@section("page-content")
    <table>
        <tr><th>Number</th>
            <th>Name</th>
            <th>Author</th></tr>
        <?php foreach ($pictures as $picture) : ?>
        <tr><td><?php echo $picture['number']; ?></td>
            <td><?php echo $picture['name']; ?></td>
            <td><?php echo $picture['author'] ?> </td></tr>
   <?php endforeach; ?>
    </table>
@endsection

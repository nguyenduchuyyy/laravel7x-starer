@extends('lte.dashbroad')
@section('section')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>DESPRIPTION</th>
                      <th>PRICE</th>
                      <th>CREATE TIME</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($products)): ?>
                          <?php foreach ($products as $product): ?>
                          <tr>
                              <th>{{$product->id}}</th>
                              <th>{{$product->name}}</th>
                              <th>{{$product->description}}</th>
                              <th>{{$product->price}}</th>
                              <th><a class="btn btn-info" href="{{route('products.edit',[$product->id])}}"> Edit</a></th>
                              <th>
                                  <form action="{{route('products.destroy',[$product->id])}}" method="POST">
                                      @csrf
                                      <input type="hidden" name="_method" value="delete">
                                      <button type="submit" class="btn btn-danger" > Delete </button>
                                  </form>
                              </th>
                              <!-- <th>{{$product->created_at}}</th>    -->
                          </tr>
                          <?php endforeach; ?>
                      <?php endif; ?>
                      <div class="mt-3">
                          {{ $products->links() }}
                      </div>
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>  
  @stop
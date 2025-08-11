@extends('layout/main')

@section('title')
Home
@endsection

@section('content')
  <h1>Home page</h1>

  <!-- <c-button $type="secondary" $$size="lg">
    Click Me
  </c-button> -->
  <c-button $type="primary" $$size="lg">
    Click Me
  </c-button>
  <c-button $type="ghost" $$size="lg">
    Click Me
  </c-button>
  <c-button $type="outline" $$size="lg">
    Click Me
  </c-button>
  <c-button $type="subtle" $$size="lg">
    Click Me
  </c-button>
  <c-button $type="secondary" $size="sm" $icon_only="true">

  </c-button>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Baby Milk Feed Logger</title>
  <style>
    /* Custom Styles */
    .feed-form {
      background-color: #fff3cd;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
    .app-by > a{
        font-size: 12px;
        font-style: italic;
        color: #555 !important;
        text-decoration: none;
    }
    .feed-button {
      padding: 10px 20px;
      font-size: 1.5rem;
      font-weight: bold
    }
    .feed-history {
      list-style: none;
    }
    .feed-history li {
      margin-bottom: 10px;
      color: #555;
    }
    .time-passed
    {
        font-style: italic;
        font-size: 12px;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <main class="text-center">


    <img src="{{asset('assets/images/milk.png')}}" style="width:15%;height: auto" alt="">
<h3>Baby MilkFeedTracker      </h3>
<span class="app-by">
    <a href="https://www.nikkozabala.com/" title="Nikkozabala.com">By: NikkoZabala</a></span>
@include('notifications.success')
@include('notifications.error')

    <section class="feed-form mt-2">

        <label for="">BABY NAME: {{strtoupper($baby_info->baby_name)}}</label>
        {{--   <div class="form-control">

          @if($last_feed)  <strong style="background: ">Last feed: {{$last_feed->date_time->format('M d h:i a')}}<span class="time-passed"> <br> ({{$last_feed->date_time->diffForHumans()}})</span></strong> @endif

        </div>
        --}}

    <?php
        $milk_expiration_config = ($baby_config) ?  $baby_config->milk_expiration_in_hours : 0;
        $next_feed_config = ($baby_config) ?  $baby_config->need_feed_in_hours : 0;
    ?>

    <form action="" method="POST" class="mt-4">
        @csrf
      <div class="d-grid gap-2">
        <button title="click to Add Baby Feed Time" name="date_time" type="submit" class="btn btn-warning feed-button">
            <i class="fas fa-plus"></i>
              NEW FEED
          </button>
      </div>
    </form>

    @if($last_feed)
    <table class="table table-bordered table-hover mt-4" style="text-align: justify">

        <tr>
            <td>
                <strong>LAST FEED:</strong> <span style="color:green; font-weight:bold">{{$last_feed->date_time->format('M d h:i a')}}</span><span class="time-passed"> ({{$last_feed->date_time->diffForHumans()}})</span></strong>
            </td>
        </tr>
    </table>
        <table class="table table-bordered table-hover mt-4" style="text-align: justify">
        <tr>
            <td>
                <?php $next_feed_expiration = $last_feed->date_time->addHours( $next_feed_config ); ?>
                <strong>NEXT FEED:</strong> <span style="color:green; font-weight:bold">{{$next_feed_expiration->format('M d h:i a')}}</span> <span class="time-passed"> Every {{$next_feed_config}}hrs </span>
                @if($next_feed_expiration->isPast()) <div style="color: red; font-weight: bold"> FEED NOW !</div> @endif
            </td>

        </tr>
        <tr>

            <td>
                <?php $next_milk_expiration = $last_feed->date_time->addHours( $milk_expiration_config ); ?>
               <strong> MILK EXPIRE:</strong> <span style="color:green; font-weight:bold">{{$next_milk_expiration->format('M d h:i a')}}</span> <span class="time-passed"> Every {{$milk_expiration_config}}hrs </span>
                @if($next_milk_expiration->isPast()) <div style="color: red; font-weight: bold"> EXPIRED ALREADY !</div> @endif
            </td>


        </tr>

    </table>
    @endif

        <table class="table table-bordered table-hover mt-4">
            <tr>
                <td colspan="2"><label for="">History</label></td>
            </tr>
            @foreach($all_feeds as $babyfeeds)
            <tr>
                <td>
                    {{$babyfeeds->date_time->format('M d h:i a')}} <span class="time-passed"> ( {{$babyfeeds->date_time->diffForHumans()}} )</span>
                </td>
                <td>
                    <form method="POST"  action="{{route('babylogs.destroy',['logId'=>$babyfeeds->id])}}">
                    @method('DELETE')
                    @csrf
                        <button onclick="return confirm('Are you sure you want to Delete this Record?')" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </section>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>

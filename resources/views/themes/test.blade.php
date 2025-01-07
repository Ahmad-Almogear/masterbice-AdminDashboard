@if (Request::is('ShowMessages'))
            @include('themes.partials.head')
            @include('themes.partials.header')
            @include('themes.partials.hero')
        @endif
        {{-- <h1>الرسائل الواردة</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الرسالة</th>
                    <th>تاريخ الإرسال</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr id="message-{{ $message->id }}">
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->message }}</td>
                        <td>{{ $message->created_at }}</td>
                        <td>
                            <!-- زر الحذف باستخدام JavaScript -->
                            <button class="delete-btn" data-id="{{ $message->id }}">حذف</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        <div class="col-12 col-lg-12 col-xl-12 d-flex">
            <div class="card flex-fill comman-shadow">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title">Incoming messages</h5>
                    <ul class="chart-list-out student-ellips">
                        <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="teaching-card">
                        <ul class="activity-feed">
                            @foreach ($messages as $message)
                                <li class="feed-item d-flex align-items-center" id="message-{{ $message->id }}">
                                    <div class="dolor-activity">
                                        <span class="feed-text1"><a>{{ $message->name }}</a></span>
                                        <ul class="teacher-date-list d-flex align-items-center list-unstyled p-0">
                                            <li><i class="fas fa-calendar-alt me-2"></i>{{ $message->created_at->format('F j, Y') }}</li>
                                            <li class="mx-2">|</li>
                                            <li><i class="fas fa-clock me-2"></i>{{ $message->created_at->format('h:i A') }}</li>
                                        </ul>
                                        <p class="message-content">{{ $message->message }}</p>
                                        <p>{{$message->phone}}</p>
                                        <p>{{$message->email}}</p>
                                    </div>
                                    <div class="activity-btns ms-auto">
                                        <button class="btn btn-danger delete-btn" data-id="{{ $message->id }}">حذف</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $(document).ready(function() {
                $('.delete-btn').click(function() {
                    var messageId = $(this).data('id');
                    var row = $('#message-' + messageId);
        
                    if (confirm('هل أنت متأكد من أنك تريد حذف هذه الرسالة؟')) {
                        $.ajax({
                            url: '{{ route("contactUs.destroy", ":id") }}'.replace(':id', messageId),
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                row.fadeOut();  // إخفاء السطر بعد الحذف الناعم
                                alert('تم حذف الرسالة بنجاح!');
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                                alert('حدث خطأ أثناء الحذف!');
                            }
                        });
                    }
                });
            });
        </script>
        
    
        <script>
            $(document).ready(function() {
                // عند الضغط على زر الحذف
                $('.delete-btn').click(function() {
                    var messageId = $(this).data('id');
                    var row = $('#message-' + messageId); // الحصول على صف الرسالة
    
                    // تأكيد الحذف
                    if (confirm('هل أنت متأكد من أنك تريد حذف هذه الرسالة؟')) {
                        // إرسال طلب AJAX إلى Laravel لحذف الرسالة
                        $.ajax({
                            url: '{{ route("contactUs.destroy", ":id") }}'.replace(':id', messageId), // استخدم route() لتوليد الـ URL
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}', // CSRF token
                            },
                            success: function(response) {
                                // إذا تم الحذف بنجاح، قم بإزالة الصف
                                row.fadeOut();
                                alert('تم حذف الرسالة بنجاح!');
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText); // عرض استجابة الخطأ في الـ console

                                alert('حدث خطأ أثناء الحذف!');
                            }
                        });
                    }
                });
            });
        </script>

@if (Request::is('ShowMessages'))

@include('themes.partials.footer')
@include('themes.partials.script')

@endif
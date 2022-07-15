// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#myTable').DataTable({
    aLengthMenu: [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, "All"],
    ],
    iDisplayLength: 10,
    "language": {
      "decimal":        "",
      "emptyTable":     "Không có mục nào",
      "info":           "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
      "infoEmpty":      "Hiển thị 0 đến 0 của 0 mục",
      "infoFiltered":   "(Được lọc từ tổng số _MAX_ mục nhập)",
      "infoPostFix":    "",
      "thousands":      ",",
      "lengthMenu":     "Hiển thị _MENU_ mục",
      "loadingRecords": "Loading...",
      "processing":     "Processing...",
      "search":         "Tìm kiếm:",
      "zeroRecords":    "Không có từ khóa cần tìm",
      "paginate": {
          "first":      "Đầu tiên",
          "last":       "Cuối cùng",
          "next":       "Sau",
          "previous":   "Trước"
      },
      "aria": {
          "sortAscending":  ": activate to sort column ascending",
          "sortDescending": ": activate to sort column descending"
      }
  }
  });
});

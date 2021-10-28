// $(function() {
//     $('.toggle-class').change(function() {
//         let status = $(this).prop('checked') === true ? 1 : 0;
//         let weapon_id = $(this).data('weapon_id');
//
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         })
//
//         $.ajax({
//             type: "POST",
//             dataType: "json",
//             url: '/weapons/changeWeaponStatus',
//             data: {'active': status, 'weapon_id': weapon_id},
//             success: function(data){
//                 console.log(data.success)
//             }
//         });
//     })
// })

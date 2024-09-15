<?php
include("config.php");

if (isset($_SESSION['ma_sv'])) {
    $ma_sv = $_SESSION['ma_sv'];
}
$sql = "SELECT * FROM sinhvien WHERE MSSV = $ma_sv";

$result = mysqli_query($mysqli, $sql);

?>
<!DOCTYPE html>
<html>
<head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 3px;
            box-shadow: 2px 2px 5px #CC0000;
            border:1px solid #ddd;
        }

        .student-image {
      margin-bottom: 20px;
      display:flex;
      flex-direction:column;
      align-items:center;

    }
    .student-image img {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow:4px 4px 3px #888888		;
      

    }
    .thongtinhocvan{
    text-align: left;
    margin-bottom: 20px;

    
  }
  .thongtinhocvan p{
    font-size:18.5px;
  }
  .main{
      width: 1000px;
      margin: 0 auto;
      padding: 20px;
      color: black;
      display:flex;
      justify-content: space-around;
      flex-direction:row;
      font-family:time new roman;
  }
  .tieude{
    max-width:100%;
    border-bottom:1px solid #CC0000;
    color:#666666	;

  }
  .tab{
    width:100%;
    height:100px;
    display:flex;
    flex-direction:row;
    justify-content:space-around;
  }
  .box-df{
    width:100%;
    text-align: center;
    margin:10px;
    border:2px solid #CC0000		;
    box-shadow: 0 0 1px #CC0000;
    padding-bottom:100px	;
    display:block;
  }
  .icon{
    width:100%;
    text-align: center;
    margin-top:15px;

  }
  .icon img{
    width:25%;
    object-fit: cover;
    display: block;
    margin: 0 auto;
    margin-bottom:15px;
    
    
  }
  .box-df:hover{
    color:#CC0000	;
  }
  .icon img:hover{
    color:#CC0000	;
  }
  .student-info{
    padding-left:px;
  }
 

</style>
</head>

<body>

<div class="container">

<div class="tieude">
        <h5 style="font-weight:bold;">Thông tin học vấn </h5>
        <hx>
</div>

    <div class="main">

    <div class="student-image">
      <img src="Image/<?php echo $row['HinhAnh']; ?>" alt="Hình ảnh sinh viên">
      <h4 style="font-weight:bold;margin-top:5px;"><?php echo $row['HoTen']; ?></h4>
    </div>

    <div class="student-info">
      <div class="thongtinhocvan">
        <p><strong>MSSV:</strong> <?php echo $row['MSSV']; ?></p>
        <p><strong>Ngày sinh:</strong> <?php echo $row['NgaySinh']; ?></p>
        <p><strong>Giới tính:</strong> <?php echo $row['GioiTinh']; ?></p>
        <p><strong>SĐT:</strong> <?php echo $row['DienThoai']; ?></p>
        <p><strong>Ngày vào trường:</strong> <?php echo $row['NgayVaoTruong']; ?></p>
        <p><strong>Loại hình đào tạo:</strong> <?php echo $row['LoaiHinhDaoTao']; ?></p>
      </div>
      </div>


    <div class="student-info">
      <div class="thongtinhocvan">
        <p><strong>Khoa:</strong> <?php echo $row['Khoa']; ?></p>
        <p><strong>Tên Ngành:</strong> <?php echo $row['TenNganh']; ?></p>
        <p><strong>Chuyên ngành:</strong> <?php echo $row['ChuyenNganh']; ?></p>
        <p><strong>Lớp học:</strong> <?php echo $row['LopHoc']; ?></p>
        <p><strong>Trạng thái:</strong> <?php echo $row['TrangThai']; ?></p>
        <p><strong>Bậc đào tạo:</strong> <?php echo $row['BacDaoTao']; ?></p>
        </div>
        </div>


    </div>
    <div class="tab">
    <a class="box-df auto-height" href="index.php?pid=4"> 
    <div>
                        <div class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAACWUlEQVRIiaXWS6hNYRgG4Geds3NPqHOOMKPcSso9nYwwITOFDPYhSScDZSAGDAyZmBhZGBgxEEUpJZESCrmLk5Brromjswz+f2fb1lr7XN7Junzv/t71/f+33+9PHMkU4CCmYG0RAbJquCapo/iSVW3P41VKcszHtDKRBizB26JgTWgiUsxBgk5ciT9sw83I/a/8JNWHRZH/PklNwvUYfoCurKqnEkVe4z4O4Cs+oAPt+I598QOSBp2a8OfIbcEX7MUYbMTzJDUtcSS7heGY1ZDkqrB07UXLwT979BTvsqrFDRVfQ1sFc7E0J8cOjC4TaUAXenPeb8adCn7jXg7h2gBEZFWXCkIP8LmCXziMlwNJXEOSNqW0I6mgDwsw0/+bPVRkGFUTGoYVeDqoTNXyeJLqwMOWqNo2GJF+op3Q99BaQhyP6UXBJNWapKXd2VovVIRuwR1u4obwJ6zHFPRgQ5M8pUKrcAibsBCTcLEuPgsvMFk/mqjMVLfgLo7H5048jkkznMOpKDR5KEJbBc+roRsf/fW31bgdP2bkUIReYTbOYgLGYkZd/Ha8jhfcpRTNmuERThCGGlbmcJqKUF7RemGpdsfnCzgj2NWv/iSvR1lFG4QNr2FEAa8X75oJlVXUhSe4LLj7Fuz3t5ptwryaiu1xsp7Mqvmu3yK0a95SvBEc4Ycwqruxpy4+D8txGs/ifV6b99YqGiZ/YBE6b0VBbBPNTRU/MaoFn7CrKX3w2Im+CtbgknDAOIpvBjCXCgZfbQ6tE/Z2dRIPkMtwDOPkHKmGgO/YnFWd/wNTFIxht3/xrgAAAABJRU5ErkJggg==" alt="">
                        </div>
                        <span>Lịch theo tuần</span>
                    </div>
    </a>

    
    <a class="box-df auto-height" href="index.php?pid=7"> 
    <div>
                        <div class="icon">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAACdElEQVRIib3WSahOYRwG8N+RoUghs40hazJ0S6YbSuKKpCzIEYVYKDYWhlKElGsoC06mWFGmkmlPGUpZWAklESHcDMfifT+Oe+/3Odz7eep03nP+b+/z/p//8w6JY7mOIE/b/59keuIqJuMuGvPUuy4dYquNKxiDpRiCm1BPwgbsy1OnsAPjoWsdCW9ja5KZiDk4RPkMh2I5RpTpnGR2YSoOYzh25Kl1lMtwOm7ha+w/WzBDNbLd2IT5eepC63iZDM8JBuiGE7QdJMn0iu89kaypPbKyhF/wMbYfojue4CAak8wtfEgyT7AR8/LUxWqD/YlwBQZiEd5jN9biIuYLVh+KZUhwJ09dqjVgrRoejYRrcA0LcAP3YnwdcpzOUyeTTG/RiZBkVmExBuMVzuep5iLhDCyJg6/EzPjciPG97UxqJ7YnmQYF60c044NguAbsR3NF0mW4jiacxRQMKpBVw+b4jFKwfkQLtuSpxdgQv39KehxHsBpbsB4v/0AG8tTOmGlrtAhywrDWhM8xLgYmaVvbvvHfV7wpM5FqqEg6C6PxDNPQWOhzRij6S7ymuuX/hvCRYP9Z6I/7hT5NuIy5OB3f/4yidF8E47RGi2Cey+iNhYXYqiRra/1ahGV3mn6xPUCoYwXNGCsoNFKwfk109Dxs1/q1UJG0n2CanviMx4JEZQjbWL8M4Xnh/PouZH1PWCadjoqkE3BAmOU24S5SF1QIPwmL/wWe+nUc1Y3wm1A/6CVIW1fC/4Zihm9j+7XfM+zUWFfhvjhEuCE/EM7FPsLlSZlYkv2KJVnN2ITEsfyBsEt0jxP4JqzFSk0/okcnxFrw9AcL/rqKbZW/OQAAAABJRU5ErkJggg==" alt="">                        
                        </div>
                        <span>Kết quả học tập</span>
                    </div>
    </a>
   <a class="box-df auto-height" href="index.php?pid=11"> 
    <div>
                        <div class="icon">
                        <img style="width:29%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAYCAYAAADpnJ2CAAADU0lEQVRIia3WbYhWRRQH8N88rlEaBS4lViYWtZDmhzIq6AVJC0wUpFxCyiaK2gRfSkrcKMosrKygFzXIa4EUfjDNisoy2FqhsEhdIi1IV0uxIAV7Mavpw9yN62Ou+1QH7ofLnDn/OXP+538mWJY0aDdjKfqjLUVLG9lca8C3Fd+iwHN4DEtC4ftQuPH/BLwaX+FVbMRQ3IW5GIL1eDkUukNhwn8BvBxdeAffoAWTsKvisydFrRiOz7E2FLaFwthGAC9AJzpwAKPLLLcdLUiKtqdoIkZhN9aFwiehcGlvgOfgPXyKE8sMLyn/+2Qp2pKiK3ExAjaEQkcojOzxCZal4Wgrv12YgzcbADmqhcJVeKpMZgkWB8vSAQzEQ3igr0B9AawAz8aTSDVMxirciddwdqOgvQANDYWVmIe1mNCEd8uvBW/ha7wiU3/PvwRqxhOySOzC2BRt4nDSnC5ndwPGymx7ESc3ADQgFJ7HD3ILxRQNRXMo9OsBvAfbyxP1lxv8VJlE12MfFuH4XoCaQmEBfiqzmp2iQSlaXroswM5QuK+GGRiGD3GoEmcJTpJZOwO/YP4/gLWX++ahPUUDUvR0ndv7sirNruEM3CJr5SFHMnVRmfl8tONX3IppsjA8jIVoStEjdYe5NxQOyoS8PUXNoW5aPIj7cVDWyvqTNuFxzCr/F2NOin6uA2or/QZiYYrm/r1WAl6D23AdTsCjmIn9co1fqAM+Df2ws9qHoTCtBDpFLsncFO0vW2NFitbU8DHelqWIXKtZGITX5dm3RyZQj32HnRWgSaHQjeX4AINT1Jai/ZWYq0NhUw1f4HcMxsRK0B9xk9wuHViJHbi24jMuFLZhtTwthqWoNUV7K4cZX8b4E101RHnG7cUabC2vuJrNFFkYvsQbMqPXy4KxGyNTNDFF3RWgMaGwWdbl38rDTK0nTQuelRt/C+7ABofbKKzAcZiaoo3VxVAYLdfvQnwkP0O6etab6oJtxThcJDO0s9w0E5+VPptxft0+oTACz2CMPNIuS1HnEX7HeERdIVP/PPn6pstaW7Uz5TfOBPkpMj1F644W8Fhvmg6MwHicVQZcJdd8iCzyO+SMJ6fo3N7AOHaG9TZFvrZ9+EPW3LtT9FJfA/wFQAIJ7FVYOrIAAAAASUVORK5CYII=" alt="">
                        </div>
                        <span>Đăng ký học phần</span>
                    </div>
    </a>
    <a class="box-df auto-height" href="index.php?pid=9"> 
    <div>
                        <div class="icon">
                                <img style="width:14%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAcCAYAAABoMT8aAAAB0UlEQVQ4jZ3VTYjNURgG8N9cN8Og8f0RkZ3FZKhBiYWFWbExZWJBYoWyk2ywoGRhIhbyUSMbZKOUxsaERAlLxCxkJcQdRt0xFu/5c437/WzOR+/7nHOe9znntLg8pgouYBq2VQrIV8vGMsysFlCOYAp2YgM6MQG3cB/9+FwanBuXfA4FnMHS1C9gEU7hE65UIniNvdiPVnThAV5iNSZiD3bgQxr/IXicVpyUdjGa5tsxtWSRS+lIrXiRadCNNZiDn2U0KYeF+IHeHA7jFT7WmQwj+ILTecwS4jSKY5ibx400aBR9hIgn0sTFJkjkUcRGDGAydoszwphQvSKyMt7DOvQIda+jI/WriltqpIfCB4dEWZ9jE2YLU9UkyHASS4T7nmAlnuItDtRDkOEZhjCIFWlHfeJurK+HAOahTdh2i7D1nUTaXQ/B6LjxMLbiPO6irRZBJexL7ZEcjuJgEyQD2JwT9/t4EwTTMZwTpcn7997Xg1U4m8NtofL7BpKH8A79mYhdwv9FbC8J/CrqnqEH38QT0MnfMhYxH1dxDd/xCGuxXLyNBdwUPmhPRP/5YBcWCFELmCHEGhGv8mL04leW0FLjZxoUH0tHpYBaP9MbNarzG3VVYP2cWKHIAAAAAElFTkSuQmCC" alt="">
                        </div>
                        <span>Tra cứu công nợ</span>
                    </div>
    </a>  
    <a class="box-df auto-height" href="index.php?pid=10"> 
    <div>
                        <div class="icon">
                                <img style="width:18.5%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAAYCAYAAAD3Va0xAAABpUlEQVQ4jZ3UO2hUURAG4G/NgkoUxSD4AmG1E0vRxhQ+CzsRwTYRRG3sVLCw8YGdjWmMtYIKNhau4KOxsrKUYKUYNERJ1KAmsThzzHLZPat34DLnzsz57//fmXMarduL2/EQO/W3aczhBF7AxGhKNPEMW3AHn7GARsfmZViDw9gasec4hHYuagbIGM70YXMZl7AxgJ7gIJ7mrwkmsNjjybkBfMIOfEB727gDmZGgLr442LG5gR+xXlVhuBlvAmw4A60Of6UgbSj8JnzBd+zHBNpZ2uQ/SHsd/j2+RXwymA5kRivD3wiZndJmYz0ezHPnSB0eRqsq7XxB2hyud4lfxcUsbb4A0M+GWGp/yU7rP2N/21+yWxXf1UqM1uNlx/sMdtVhdB97MYIN0tmaqQPUCn9PGr5rhdqitOP4aWn4agO9wnLp7nmMC9JQ/jcQrMNdHJEmfKQO0B5MScM6K52pc3WA3mI0agZxDDd7Feeu/e6Sm5Ku31MB9qAHxnwn0EKB2e5CDn5loI84ixXBrFEp/Cq1f20lnq/ek5huYh8eSf+jjr3D0T+DjmL+E9i22QAAAABJRU5ErkJggg==" alt="">
                        </div>
                        <span>Thanh toán công nợ </span>
                    </div>
    </a>   
        <a class="box-df auto-height" href="index.php?pid=6"> 
    <div>
                        <div class="icon">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAVCAYAAACpF6WWAAACIklEQVQ4jZXUTYiNYRQH8N877tgg5dsoai6JLCbNnqwkCSXCQl0LzEaZomQrmfKxGWSuFaOmFFlQvjY+CkWzUNRdSIybr5GPxoxxLZ7njrfXvXM59fS8z/uc8z/n/J9zTtLaU9FAduEIpuIbDuJk9bJU+NugqQHgBZxCLzbgLE7g0ni2ucx5BdrQjL2Yhxu4ju+4hTw2ooyj+aIR9JcKbldBklT6K3En4+QDEkxL/fuEX5ie0V1TKriWjXRR3OfgK0bjeUKNDNN3zdHRUgJompftMYKy8CBDcX2rscbuSgWDGMbmfFFSTX8G+jEXA2iNBu0Cd/XkKh7EwJ5jYYx4WQ4Po6cu7E6l24YDqFVzCd6mQGcJZbYaj5PWnkoFi6PSZ0wROP1XyWEEC/ADb3Px4xLu4gt+RuVtMXqZaJO4H0JReLRP8bwcwzkMYllcHwU+4Y1QYvXSfw2lgkq+6Ct2xrty0tpTGcEOgZdj6EbHf6TfhU6hfV+gt0ngpAnHI9ieSMXEBmCJ0GGd2FcqOCxQ0Vwt/tlx78ZT3BPasj2es7IEjzAJq0qFsU5s4U/xj6YM7mMmXuIJNmUA1+KZUCktKUDiI9ebNO+FwXERfbgi8N4nFP1lYdgM1DLOTqmsbMVNnME6oRI6BJrqSjXS8Sb1OWFozI/64wFW0qDvGkQMr/5Bp8yf9PdjcvSU1LOoJfniWISJ2AA5rMd5nP4fsDoyhC2/Ac3ZmT6WouV7AAAAAElFTkSuQmCC" alt="">
                        </div>
                        <span>Yêu cầu sinh viên </span>
                    </div>
    </a>    


</div>
    

</body>
</html>
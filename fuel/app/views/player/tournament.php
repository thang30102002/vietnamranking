<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?php echo Asset::css('player/style.css');?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php echo View::forge('player/header');?>        
    <div class="ranking-player">
        <h1 class="title">Giải đấu</h1>
        <?php foreach($tournaments as $tournament):?>
            <?php
                $rankings = Model_RankingTournament::get_rankings_tournament($tournament -> id);
                $stringranking='';
                foreach($rankings as $ranking):
                    $stringranking .= $ranking -> ranking . '';
                endforeach;
            ?>
            <button class="btn-player-1 btn-player btn-tournament" name="action" onclick= "registerTournament(<?php echo $tournament -> id?>,<?php echo $tournament -> fees?>,'<?php echo $stringranking?>')" value="detail" data-toggle="modal" data-target="#RegisterTournamentModal">
                <input type="hidden" name="id" value="<?php echo $tournament -> id;?>"></input>
                <div class="player" data-bs-toggle="modal" data-bs-target="#myModal" type="submit">
                    <div class="img-player">
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxISEhUSEhMVFRUXGBYVFhcVFxcXFRgXFRUXFxcXFRUYHSggGBolHRgVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGy8lHyYtLS8vLS0vKy0tLS01LS0vLS4tLS0tLS0tLS0tLS0tLy0tLS0tLS8tLS0tLS0tLS0tLf/AABEIAKIBNwMBIgACEQEDEQH/xAAbAAABBQEBAAAAAAAAAAAAAAABAAIDBAUGB//EAEUQAAIBAgQEAwUFBgMGBgMAAAECEQADBBIhMQUTIkEGUWEjMnGBkRRCUqGxB2KCwdHwFTPhcnOSorTxFkNTk8LSJDRj/8QAGgEAAgMBAQAAAAAAAAAAAAAAAAECAwQFBv/EADERAAIBAgQEAwgCAwEAAAAAAAABAgMRBBIhMRNBUWGBsfAFIiMycaHR8UKRM8HhFP/aAAwDAQACEQMRAD8A8fpUqVWGUVKlRoEClW7w/wAK3r2HfFJcsC1bnmFmcFCADDAWzrBG071V4ZwO9et3LwypZtwHu3DltqTELIBLMZGignUeYqHEhrrsTyS00MylWze8OXfs5xVopfsqYd7RaUP/APRHVWXcax3mpb3hS8uF+28yw1jbMjOTJOXLGTRp01ilxYde3iHDl0MKlWpi+DNbsW77XbJW6Cbaqz8xobK3SUEZTIJmNDE0sFwO5cstiSVt2EYIbj5oLn7qqilmOoOgqWeNr3FllexmilWz/wCHrnPtYcXLJN5Ve02ZuW4diqgHJIYlSII3EVau+D7y3mw5vYfnKJNvO+bROZAm3BOXWJpOrBcw4cuhzoomtzhvhbEYjDviLGS6qCXRCxurpMZCupjXQmY0mq3CODtic+S5aXIrXGFxmXoQSzghSCAPWafEhrrtuRySutNzMo1u8M8K3b9q5ft3LHLtTzCWcZQsmSMmxAkf10qtwrgl7EZzbAyWwWuXWOW0iidWYjvB0ifSjiw112DJLTTcy6IrZt+G7ty096w1u+lvW4LRfOg16jbdVbLodQDsfI07gnhq7ikuPae1FsZrgZmDKsE5iAhEQp2PalxYJXbDhyeljEpVsY7w5et2FxQyXLDHLzLTZlBmIYEAqZ01G/xFZIFTjJS2ZGScdxpFe2+BeLDGYTI5lwMrT3dRqf4gQ3zPlXisV037PeMHDYoKT03IU/7Y9w/mV/i9KpxNPPDTdGjB1slSz2ZleJeFHDYi5ajpnMn+w2301H8NZVes/tV4OLlpcSg1TU/7De99DB+teUEVKhUzwTI4mlw6jXIZSNPAoEVaUXGUjRiiRQO5HSpxFCKBjTXTcA4Pli9dGu6Ke3kzDz8h2/RnAOD7Xro03RT38mI/Stm6zOYUFj6a1zcViL+5DxZ1cJhbfEn4IixV+aqATUWLv+1FtB7v+YWBEzElRMBRsDuSTsNr1pKyuOVG1SzMFu3Vq3bp1u3Sdqgk5uxCvWjQjd78kImhQqHF4pba5m+Q7k+QrVGNtEcCpOVSWaW4sZi1tCW+AA3PwpVzWIutcYs3y8gPIUquUFzJKC5mXRoUq3CFRoUYoA7Pw3jSvCcdbAMO2v8AwWx/Kn8WxhPBcNatghFuBnjYt7XNP8Z/SspOK27PD2wyNnu33D3CAQtpAEhJI6nOXWNBmOumtHhXGrlhHtwly0/v2rgJQnTUQQVbQag9h5CsfCbbkl/K/wBdLGp1IpKL6WOl/ZlxDlfawwm21teYPuwM41/hLVW/Z5xE5b+BuAtZvoSy/hcAAsvqRGvmi1iYjjbcprFpLdi0xlwmcs/o9x2LEeggU3gPHGwjm5bS0zkRmuBjAO4UK4Gum4JpzouSm7au1vAUakVlXJbi47i+ZeOkLbAs21/DbtdKj47sfMsT3rf8OeIbaYU4LGWi2HuMXRhOhmCdNdGG41EkbVy+PxYuu1zKiFiSQmYLJMkwzEifjFWsPxkCyLFy1ZuorFlzF1dS0SA9twcpjarJ080ErfkrhO02zbuYD7LjsIUdnt8y09rMZIAuhsojSJJOkTmNW/E+OsHGYq4wujENbAQyMgucq2FKZRmDZR59zWCfETtfXEOtpmQKLakMLdsLquRVYbepO/wia94pLXvtDYfCm5IOYrd3UAKcvNiRA7dhVfCndN66W37k+JCzS6lzwx4gvYC0z25B+0Ww6nQMotXQyN5GYPoQPhWrxC1bfnY7DCLd3D4hbijTK722BIHaTMjz171yicZJstZa1ZYMxuM5D8wvr15g4AIk6RHoZMjh/F7lm3etoQUvIUdW2EiM666MB/rMCnKi23JaPzXrYjGtFe69vJnQeE8aU4fj0AMOkH/22FSYbGRwW5atje4GukdyLiHq/hCfKsPhfiJ7Np7CWrDLckXC4uFmkRqRcEaaaR9daj4Xxh8OXyZCjgh7bjNbYGdCpM943mh0ZNt90/6BVoJJdmja/Znj3tYtiskG0wYdozoQT8/1NWvBuOCHiIQRbdGAyiYQ82IEjsa508cKI9uxbt2Bc0coXZ2H4c9x2KrrsIqTgvH2wyOiW7JziHLhyzDXQw4AGp2ApVKMp5nbe32CFWEcqfK/3Nni2Lazwy3hrMvYutnuXSIJaQwULrl1Udz7hHeuOBrXwnH3t23sBLT2XJJtuGZVkz0MGDDt3OoneTWSq1fRg4XT63+pVVnGVmugSaYD3qQrTIq4pR7d4S4kuPwWV4LQVcfvAQ4jyIIMeTV47xzhxw9+5ZM9J6Se6nVT9Pzmui/Zxxg4fEhCem5A/jHu/USvqStb/wC1rgoKpikG0Bv9hjofkx/5jWGHwqzjyZ0p/HoKfOJ5iDQY04LQZa3HOGUZpRRIpDGGt3gPCM0Xbo6N1U/e9T+7+vw3ZwLg/M9pcHQNh+Mj/wCNb+Jv1z8Vif4Q8TqYPCX+JPbkgYrEVe8LqbpblnKQrdUSqOpYS6yJ0I08x6Vz+NR2BCxqD94qRpoQYOoqfD4QWklixuMQ7CZCnKBlBX3tpPw761j4ayb6m9ybl2LfF0Xm5tGuakwAJJILEAbSQWy/0o4bDkEkmSfpA8qWFsHdt/8At+eg+lS3H7Clq/dRGrUjRjnl4ITt2G1R0qjvXggLNoB/cCtEYqKsjg1asqss0hYnEKilmOn5k+QrnMTfa62ZvkOwHkKdisQ11pMgDYeX+tG2lXRVhxVgJbpVYRaVO49TnqNCia2kRTRptECgBE0RTaK0Aadq4/MtWkd0DcpYtkgzcCkmARmaWP5Ctq7hHTENa+03ygw9y+ri8YbIjuIYD3egg9IIM6aa86LyGC4fMABKMBOXRTBUwQIG/YVOuMt5s04nMRBYXVzEeROSY9KplFsuUkbfEMJiLYxJXE3zySpUG44ZrWmZ9G2Ge3r5ZtoinXVvLiL9oYnFZLVlrk85pLCwLwBOwB1Hymsb7Xa3JxWoKn2yyQxlgejUE7jvUn+IWu7YzXf266yIM9HlpSyS9IM0S5wPFXr10WrmIxQLBmBW84gLae5JBmZyrHoZqzFxlUjFYnrw93EqTebKotF/Zse7RbILaQWGlZVvFWM2cfag34ucmbaPe5c7aVHz7AGSMTl/DzUy9jty47D6CnKLb0IRktmdAcM/2q5h/tOJhC4DG8ROXDvd1kRuoE+Ro/4exuvYGKv8xXUKrXCM6hEa4qk/fGYlTswXTcVgjGW5BBxUgQDzlkAiIByaCABHpQu4m2Yk4g5YyzdU5cugjo0iBHwpZJekPNEv2LVw27N5710o9zJcCucyBlDWyOxzLmOv4YrTw/BWzhGxF4k32tgo+mTlNdR9Z1YBT8GFc0uMUTDYgTE+1GuUQswusDQU+1igoAVr4gyALgEGMukL5afDSm4Te3kLNBfs18Fhjd6UxF4XM3SvNJS6qBeYLbwOrUldNcpG9GyAyWH+0YhBe52rXTlU2QvvZQSFJJk65RrrrWKcUhiTfMEETcGhGxHToRA+lSWsTbAABxACzlAurAzaNlGXSe8UZJCcol52uLiDYuO7KQQyvc5ikG3MggwRqGU/A6GsJDV37TbVi6rcL9UF3UiWUjMQEkkT57x8DQAq2CaKp2ZIRTM1OdTTKsIIkViCCDBGoI3BGxFe1cCxacQwGVwCSpVh6xDgeXmPQivE1U11/wCzLjXIxPKY9NzbyzgfzH5qtZsVTzRut0bMFVUZ5Xs9Dl+IYNrN17T+8jFT6jsfgRB+dVia9E/axwTK6YlBoYR/gdUP6j5rXnTirKVTPBSKq9Lh1HEANa3BeFc0530tj/mI7D08z/Yj4Nwo3jmbS2Nz5/uj+tdLduBQFUQBoANgKyYrE5fchv5GzB4TP8Se3n/wV+7AgaAaADYVTJk0WJplpCxB/v4j4eVZqGHzJybsv9m+tXytRS1LFu3U9vCjNm/7Cn2bWnn8aN67Gg+dZ1dytEtqVI04Z5gvXOw+dQzQoO4AkmAN61QgoqyOBWrSqyzSFduBQWOgFYGMxJutOyjYfzPrTsZijdPko2H8z6023bq6KsRSsBLdWFWiqUWPaozmoq5ow+HnXnkj+gE0qSrNKs2WU9T0axGFwi4V9jnBRptEmuyeUEKdTK0/DnCWxeIt4dSFLkyxEhVVSzGO+gOnnFJyUU2xqLbsjOaiBWvieBHmWsmli8fZXWZXBAucsk5QIYNAyRudyNah8RcPXDYq9h1LMttsoLRmPSDJgR3qKqRbshypySuUIoLVvAn2eJ/3K/8AWYWlh8civYblKOUVL5S03ctzP15iQDHToI0qdyOXQgFNgTW3c4vbK2j9ngKCpO4LfZ1tBlLSJkK0GT0KZkk1Lf41h2zg4SFZgxGcwHMByBAhmAI9IkbmncWXuYgoPFbz8Uwyvdy4ctbY28mgRlUBcyzqTMHvrJ0qB+LWS+ZsP0tYW0VkAFlZYujpieiP7NFyOXXcykinRWyON2Fu5lw4K8oW1WRoSpDHUGfeid+nSJpY7jFl1KnDRCNbUljKsV6Tr5NnMd59Jp3E4dzEtgTUtajcYw5UBsKpKoqghsoB1LHoA3P01OppLxPDjmThQZkLLe6ciqDt+IM0fvR2oTE49zIcCngVrf4lhHuozWCq5mZ5OctNsgCNJ68rb+fnUeN4pauWxbSyVOYtmzA6a6BQNBQmJx03MxxprQtimO00gYpitoS1HAmnO9RUMEiagHKkMphgQVI3BBkH5Gmq9MY0MIppnt2BupxLh8HcoQf3TsY+DDT4CvJ8LwV2utbcZRbYq59Qdl85/QzXS/so4o1u69oj2baz2DbEfMa/wetb/jbBcp86jpb9Y0/L9K5U6kqDlCP6O5ClHExhOfL7nNsyooVRAGgAqGxYe4wVAWY7AAkn4AU0makwmLuWLguKxXyZSQyk6bjt/Ws9Knndufn9O5fiqkoUm4LXl09etht/BXLbww1UlWWII11mfKrVmz/fyirWKxNy82e4xZoCyd4UQJPfQb1Xv3sug3/SipVdRqK+nTTuQoJ0aXErb7279v2C/djQb9/SqtCaRNWwgoqxysRXlWld+AiY1OkVjY3Fm4YEhQfr6mnY7FZzlX3f1/0qO3bq5KxUlYFu3VhEoqtF2ilKVtS2lTlVmoQWoHMUxVmgBNWUSKoSdR3ex3qk4ez6OSGs36v9OgAIpUaVaDzzbk7vc5QCjFAGiTW8QIqzgcY9m4t205R0MqwiQYI2Oh0JEHearTXT/arT8PS4Sq4jC3DbgAA3UvKxtsY94oVO86IfOoTlble+hOEb8zJbjWIm3FzKLU8tVCqiyxc9AEGWJOoNQ8Qx1y/ca9ebPcb3mhRPbZQAPkK9Ax2Fw/MHPVRY/wAMRmYoqxf+6yONeeSToNTpv25zjGLtXMLhsSuVb5R8LdRQBLW8pN6BAlkfUxu48qpp1U2rR9ekWzptJ3kY+BX2eJ/3K/8AV4WmW77ubaqoDIMq8pQt1iWLSzIJZ9YBOsAU7BN7PE/7lf8Aq8LQuX71wWbdySqqUtBoVchdiYYxK5i2pPnrpWnmUa2NniHELtx4vYbqAv3DzFObLdJ6jzBsmiiQR0gaU3FcaLlpwtsZme6TkUmCjWy2qdnGYt3ZNe9P4jjcYqMly0oDC9sM3+dfPMCsrETzCVyj0kbGpMdxTHoDzLYErdWRLMM/W7AhzlPedAI9NANSPC8UY2wowq3BFi1my5pa0AiGcp9oQcu+xAjzCccskgNhLJBgQqqSOpmhARpJbYHahZ4heBNw4cFnupcki6DnQB1VVD6p3AgjyiBFt+P4tFB5ARUy6y6iFKv1dcgkuk6ieoRvDIq9zP8A8RhRFshC98rmIye1VlhVy5FKrcGwidYE1Zv8fR85OGskucxJAMHpzESuhbLqRqZnepsPxnFWgLRw3+UGSCLzRtOY540EQfI+smlxY37+S4bGUZMiZVaCFU3vvEkkq8jzERQrEZOVwY3iNtrk27IW3LMUYJGZrYtghVXL0xmEg6lvOrreIVIObD2mJuG40gEGc2hBWPvRMToNawkwd6SOW5jRtNjExP4o7b0+7aZACysszGZSJjeJppIjJyJOMXUuXM1pMiwBlhRqJ/CB+cn8gIESKga5NTW7k/GmiErguW+4ptu33NG7c7Cm27kb7UBrYlYTUHLM1M7RUGczNDCNyYCpcDw5rr5V0H3j2A/r6U7AYZrzZV+Z7AeZrqLVtbSZE27nuT5msmKxKprLHfyN2CwjqyzS+XzDZy2Qq29Muo858z5mu+cLjcF+8B9CNvoR+VedEzXU+B8fy7htN7rfr3/r8jXJT6nesrWRza2SCQRqND8RVhLdbvinhvLvFhs2vz/7fzrDxF4KPX+9ahq5WQ5SjCGaWwMRey6Df9Kok0CZ1pVsp01BHAxOIlWld7ckGsvG4rN0r7vc+f8ApTsdiplFOnc+foPStHw/wtW9pcEqD0j8RG/yqcpKCzMhRoupKyKXDeD3rv8Al2yfXYfWuhs+B8URso9JrqMO8oyWzllSBCqY0OsEa76zppU6i8CzC68lXCyqkLmiIIMEAAbg66+lYZYqb2aR1Fg6aWqucYfDV5CRcXtpB0Y9hm7fOufu2mVirghgYMiDPkQdj6V63h8eQoTEZSJC5wpIbMGJLfgEkSSAPLfTnPGGEFsi5lzSMqsQQQCCMrg6kDtO21JVZyllka8NKnhk2ly8TjESKJFOoV0ErKyOBVqyqzc5vVjTSoxSqRWciKJFIUa3jG0/LTQakQTtrudNdBqT8KYiHIB2FPVaRYU5ddu+1IbbJLN3It0RPMQJvtF61dn1/wAuP4vSg993CqzswQZUDEsqKTOVQdFEkmBpJNNYxod/KiFIAYggGYMGDG8HvFAruxotxnEED2mzFx0p7xui8TOX/wBQBvlG2lNuccxDLyy4ywy5QlsCHXI0Quhy6TuBtVKabnE07ISlI1cPxq+GDFgYYuAVUDMVdSxygSetz8WJ7mo8ZxrEOGVn6WAUgKsZVJyrtMLJiTOp8zNMGg7DanZEVKRprx/EmZuDqYMxyW5YrlCz09sooJxjEIoVLkAZTAVN0VUUzlkkBE3/AAg7is+24NPzAUWQnKVy5Y47fClAV1fPmKgmeWtvY9MZVA286bjcZdvAc18xBZgYUatGY9IG8D6VSt3BPlUwNCSFKUiuRFS2k7mmvcE+cVKDNNCbdiK4kfCmos1M7RTbT9qAu7Ce35UcHhWusEQa9/IDuTU+HstcYKokn+5PpXT4TCrZXKupPvN3J/p6VlxWIVJWW5rwWFlWld/KvVhYXDpZTIvzPcnzNX8NgZ94AsSohiwVc3uhsnUWMEhRsASaz2M1o4W6W0JhoyySQLi6ezukEads3yOmo4sm3q9z0KiklGOxHcwYjMhWMoYqDJXsYndZ9SROvnRw8qQw3BkVo4u5AgghoICsZKBozToANAFCgAAa7ms2/eCCe/YVBXk7Ik3GEXKWx2+OX7VhM66uo0nzG0/pXmzMSZO/ea63wJxaLjWXOj6ifzH6H61l+L+G8m+fwvLD4/e/kfnW2msrs9zj4uXFpqcdr7GJVHGYn7i/M/yFOxmJ+6u/c+Xp8arWbVaEjnpCt2677C4IC2i66KPONtfTcmuMRK9G4O4uWkMjUAR6x/odKx4ttJHR9ntXl4FzB4qxhLHMukAaEnckn3VA3MCNPMk1zq+IL+Kv3nsYpbKWwGtIyiHWNcwb4anWJFLxRw57y8oGCIZJ2JEiPoSKwMdh7+Je1bfDspUjO0dOXSQGHbfvWanTi9WdGR23D+JJjsKXZQrEMGA2zJBJE+nV6EfGauLu83CFXnMF0BUKenZgJPp37dtqhwdgWFKJp0lQPLNuT67/AFqDFYpgjztlP12/mKSWunXQHFW1OUoU6ga6p50bFKkaVAHIUTSFGugMbXScL8TC1aS09kXVVbikMVCvma2UB6ZgBHB8+YadftYR1wV3oti6VsYhBpkNu6nNvz93MjKfTN6Va8R4a2LF8v0taxZs4UZiZwwX3VBJzIAFbN5tvrFU8ZXSt62LuG0m0yjxPxFbu4e5YFkhnaRdZlLjrtNEKoEAWyP4vjM58UWxca5bw5UtiHvwzqQBcvYe61sAIOkCxkHpcb4G9jeFYYWgzIqD/DEvh/dP2ssQgmepn2NsjsCKm4/wewn2s4e0pu23wuS2Bmy2Xso1x1t655uEgnWNdqiq8b2s/VvyTdOVtzJwXihLfOz4cXDcvc0ZmHSo91NVMldCDpqB8DdTxraDIThA4URkdgVnmrdDKMujAovaDEHQmbnBeFYe4/DjcsqOc2O5qRKkW2blqzFpUKIjzjWud8N4G3cw+NuXEl7dlWQmRlYuA0AGJidxpTVaLvpt+bEXCStr6tckw3HURMpszriSeoBX59p7aG505s1vMCCGG3Y61LjPE1p7ltxhlUJiVxBUFYKrevXTbHRpnFxVYmR7FNI0G1w7gVoLghi7IQvcu5mnIpBtM1ixc6pLFlBneOkmTWXe4PYLYJn6AyWWxwBCi3nuhFYj/wAssN42iYHc48b29c/wHCna4y34lU23RrAYtbe3mkSpLYhldCQSGHORZJMi2ZOsiDjHHLN62VTD8ps1twVZSoNtOWAVybFAuk6sJ7xXR2eDYM3LYuqqOb2NVLYJVbiWi3Iza7TAB+/sSapXuGYYWGdVVsWMHYu8ncc1rmW43L/Fkg5NhmmNqX/oj0YcGfVFa14uWSWwyufYxmK68pEBz9GvWr3B5G4d6efFdsSPsw/zEuISymMi4cBSpSCDyXJ0/wDNI2LBrA4Lhhj8QqgGwovCwM8q+ISwj8qZlgGY6d8oGutK7w7D8t2RFbEDC4K5yTqBdu3IxHs/MJkJX7vMJgaQ+PHTR8vuLhT6op2vE9hWDLg1gOLgUsGGlh7BtElZNsqbZ85QmddJ28V2zlP2VdGLMmYZGVsMtgoVy6CQzaajNoZ1OmnA8BzytrLct/bGtXSXJFuwMOW0aelQ+b2kzKROhrnuA2rFx71hysPbuci8+mR7cuhaNlZQQflFONaLTdnoRnTkmldFXjXGueqIEyhXutuDIdyUGij3VOX13rMtTXScJt4W8BauItprjZ7F0iNUaOVdGxVxpPZj3mKu3uG4cWlLIEX/AA1L+eMv/wCUWhRM9TPqCkdpEb03XUXZpkXScle5xrzOtOw9pnYKgljtUq2i5CgSToAN66jhfD1sLrBc+8f/AIr6frSxFdUl35EsJhnXl2W5JgcGtlI3Y+83n6D0qd8NcjNkbLEzE6difL571ExmtnBFTDFZZgACCQ2e2MpAcEZQVKMWMgQdK4k5tvM9z0MYKEVGK0Rn8PVM0vtBjTMAexZfvD0+HaRVnE3c7TrtEnVjHdj3P+g2Aqd7iQQTzGiAxUDX8WcHM3wYeXwqneuhBJ/71XrJk7qKzMF66EEn5DzrKuXCxk0r10sZNMrfSpZFrucHF4p1nZfKS4bEG26uu6kEfLtXfeJLH23Ai7a98LmHnIG3xIkfGvNMTiMug979K7b9lWOLlsIxnMC6yf8Ai/Mz8zU5xejW4YWa1hLZnn9q3VtErc8X8EOFxLLHS3WvlqeofIz8iKylWrGZZKzsJVrd8O8W5Jyv7pP0P9KxYo1VUgpqzJUqrpyzI9IAS4oBhtJkAgSImN432n6xTPsY7XGj4/zrgsNj7tv3HI9Nx9K0F8UXQIIUntuNfhWB4Wa2OtDG0mtXY6d8KqghR31312J176GuT45i1J5aREyxGxMnQeepJnuaZj+K4h1ObMqd4UqD8WO/1rMrRRw7i7yM2JxmZZYjaBp1CtZzhppUqNAHHUZoCrFjA3bgJt2rjgaEojMAfIkDSugSK9FYHarVvhl9mCizck6CUYfhnUiABnSSdBmWdxQv4C6jZGtuDmygZTqxYqAp2aSrARvlPlQNplTKPIVNfvtcbNcOZjGpielQo/IAfKpDw+9Mcq7J0A5bzPVptv0XP+BvI0PsdwEA23BJAAytqSWUAaaklHHxRh2NAaldgPIUqsNhLnX7N+j3+lujf39OnY7+VEcPvQTyrkKJY5GgDKGkmNBlKmfIg96AIIA2A+lCB5VdXht4tkFm6WgnKLbloBgnLEwDoahbBXRvbcaFtUYdKqGZttgrKSewYHvQLUYhHlQbXtVk4K4pCm3cBJygFGBLQDlAjUwymP3h5imXcI6zKOIEmVIgB+WSZGgz9M/i03pkeZEhj4U5yNqCLT2E0Cb1IgBU+cRUSrUsdqaEyM1JYWSABJJ0jck0zIZgazoI7+ldZwXhQsjO+tw/8o8h6+ZqivXVKN3uacPh3XlZbc2S8L4eLKy2twjU+Q8h/WrVxWgEggNMGNDBgwe9TW7OcFi2VQQJgnUzGg2Gm/wq+0ZZZg2igrFwBlAhWUlYRwO40I+YbhzqOUs0tzv06cacVCK0KuAwIbqaQuokekZmJOyrIPrIA30mwd4JOmbUFe3UJAJHlBMjvpQe0VGjEo3UO0wSOpfMGR+lRXHCiTtVe5boldjblwKJNZF++XMn5Dyo4nEFzJ27CoZrfRo5Fd7nCxmLdV5Y/L5hqHE38ug3/T1pYi/lHqdqpopJk71fYxJBtp3NanB8Y2HvW7ye8jBviO4+YkfOqltKnVaLjud7+0Lj+ExSWuSS1wGSYgLp1A5tTOm3cb1xAFG2vrXf4HwzgbWEtYjFFma/HLGc27YZlLIjXAIQmIzMQJMUX4krI1SwtRwVWWie3c8/o10B4BzsO+JsIU5ZK3bZuLdVWVirotwBSWQgSCuUggqzDbnyKUouLszLKm46sgv3Y0FaHB3AM9/PvVLh+DN57qD3lsvcQebIyGB8VzV3fgRfs2C+2W8OL9+5dNpCzJbtWVGma5cY9CkzqASZVRvqZHJpI24ZRhBze5p8K4wlsAMBuJJ3A2Onwqp468LW8jYnDqFZeq4i6Ky7llA0DDfTcT3q3wjF28RbuYDE3HvXw2IK32tulsXVbNcs4d7pLvyi497dfMAxn+FPFC3bQw94gMBCE7OpHuz+IDT1EetW5cvuy57E6iVWN0tjgaBoLtpt2omqjmjTSpGlQM4+tPhPEL1oNyjbGZrZJdlBBtXFuLlDMO6idDI0rMrU4OcPluc4EmOmAfI+WxrdJ2Vy6jDPPLdLu9jTt+JMWrZh9n99LmXmLlBS01oADmzlIaTrJKJr0gU08fxPso+zjk3Obbh0MHqOUlrpJTqbSd2JmSTWfwjEWFVluW2uXHMKciMF6GCFQxGZs7KSp0IUa9qs4rHYbmKPs5RU+0q6hUzSwdbAzEmSkpJPdSeqouVnaw0rrclscbvIi2cmH5KgrkF1RKMMUGUObpIkYu8J1iE8jIx3HsReCrdGHYLebEQWWGd3e46t7Scha4/SI30iTL8VxDC5c6YYhTz1XNatAcxrhezBDSQi5FYa6E+Yp78U4eWzDDXAJtmMlrTl3czADPs1ssh9VU66mln7Dce5Tfil4m80WJvKysc6yA5zNBNyWJMauWIgAQKs4PxLi7YhTY0tWrIJZJC2QQjf5kFwMokgghFEaVUTFYMMk27joLT27gK21LEk5bikOYeDv2KrvrV7/FOHlp+zOBmcwEtxleRlALx0whUmdS/oaHPsJR7lK7xO+1wXWNosLLYf30go1lrLEw8lyHdpn3jPpVweJ8TCgrhiFttZ1ZTNt7Vqy6n2vdbKa77+cUy1xfCQufDgf/rk5LNuDkJN9ep9m0AO/nUNniWFzPNgBGuWmWballQAc1Sc2gJAiBGraCctPO+gZe5ZxXiPFXWtu5sE2uaF6lHTftLadDFySMigAzI89ojfjt/I9sJhlV0a0QpUAI129dhBzIXK95iI/Am8GWvj8KL02rOZMl5QrW1aXd7jWiBm1Vc1oSdcqkRrVrEcSwSvBwrAqUzKbdvcF84MPoYZNPNYMakrP2Fl7nNK1Fmit3EYvClFYYV0UuhA6IdUFnmqHJz7rdEj/wBQFjOglu8TwakFLUsBo621EObSAXMrEardVmyaqQ2/apcR9CDpK+5zgang1d43jbN1gbNs2xNxiGALSzkibmYl9I0IGXUAkVr8A4RkAu3B1bqp+76kef6fHaNSuqcM0v6J0sM6s8sf7JeCcK5Y5lwdfYfhH/2/StfDqGcA6jUkDuFUtHziPnUTtNSWAQQw0IMg+oriVKkpvNI79KlGnHLEvviHGVQJzBG7lTmHuKnuhJJWIklZJna3fJRYFwjToCuSR1EFZ+8mjQTqI+te1ilA2YfuqwCyd8sglJ9D86r370yxgAD5ADYD0qjcttYbfvbs7E+ZJJP1NYmLxJc+g2H996OMxZc6e6Nh/M1WroUKOXV7nFxmL4jyQ+XzHVFfvZR69hSvXQon6CqWpMmtKRgSCoJMmrNtKCLU6ikwY5Fp9AChdMCfI1EIWzK+wcO+s13XhfxM1u0cPdRb1kyMj9gdxqCCvoRXBRG1WsPiCKzxm4yuj3U6EKtPI1oem4/jNhMMbFi0tq2wYFbYVQM0k5VUAanc+przTE+8a1sOeYqwxJ1ziICgba95rHvxmaNpMVc6kpyuzi4/D0qOFcVvdf3+ivg8c2GxFu+onIdV/EpBVl+YJj1iuwt8YtYe3cTJz+HYzMYU5XtOwh1X8LCAcpiIEbGeQu2waqC26ZgjMob3gPdaNsy7GOx7VapaaHEo1VHR7Ha/+JUW1dt4fn3b19874jFcoOvsls+zW1oGyDLm0OpOtc5xDIiLbWC27Gs1OZtmI+VT2rUaneoyvJ3kXyxEYxtTRIg0FKiaFBhBSoUqBnIVpcK4qbAcZA2YdzEVm0q3yipKzLaVWdKWaDsza4J4gbDKECgjmLdmYMrcsPHw9go31zH0iXD+J7ltrhTMVe6LuVmMaI6wVGmuYEjaUUCAKwKVRdOL5BxJHTHxldzZuWnfQyRB5uhHkec4PmAg0y6wXvEzPdtXWtqWtEuvU4Gb2YUgA6Ry1kfeLMTuIwKVLhQ6BxJdTcxfia7cttbICg2xb6fQiWE7dOdIGgW4471ZveMLrW2QIFlAgZWIYQuUMCO4gGuapU+HHoHEl1OoXxlcBY8tZNw3hLN0MbaouWIgLlBH9mqeP4+t229rkKoZVXR36Rbz8sAbQudoH1kaViUKSpRXIOJLqdVc8Z3DBW2oIYOZYsMwutdaBp0nNlAPugASYmqj+J7may0QbLqy5XcZgi5QLgmGYjMC8SQxFYINCmqUFyFxJdTW4nxlr6W0YH2eeGLFieY7OZ9ZaJ8gPWc6aiFdJ4e4NMXro6d0U9/3j6eXn+sZ1I0oXZKnSnWnZEvh/g8Reuj1RT+TEfoK3HaaLtNWeHkK0n6+Wo/lI+dcWpVdSWaR3qVKNKOWP7IFt1Mq1dxd9C6lQCAZiABGmkbdjptr8acuOQam0h6VBmPu5pbbvP5VW0r7lt3bYokxWNjsZnMDRR+fqa1MR4gTN02EKgzrGpkEGcvaD9Z0gRRucSQkHkLIynQgZmUzmbp7gICBEwxnqNbKFBR957nIxmMz+5Hbn3M4Gm3LgUSav8S4rbcA8lE1liPeYn1AEd/PUyah/wAaRmLNhbM6RAhQVYsvSQRGoBGmaNT2Gqxz7GTqxk1YtpWu3GUbfDW50APTm0neEg9uw7+ekVvFJnRuSoCqFIB1YhSpbqBWSSG1B1UetDBlRRUgrUTitvY4ZI0zAGAYVl0IGghm8zOUzK61mxoKMvLUEx1AAEe0ZzGnkQu+y/SIitSIoTRpESsxKaRI/MU+3iB9N9D+dTRWjgbtsWyp0MSrSQVcZ4bTcEMs9/ZjtvFwTOphvatajHJo13Kq49iMq9I71HNXMNjkQt7JGliRmAgA7CI0j0Pn6ES3eJoSCLCCM0AZYOZQBm6dYie1NRSMuJxVTEO834cjOoVpHidvNm+zpHUMugBzERss6R+Z+FQXMapcNylCgk5RHdi0TGvYagiBtqaZmKdKa0X4mpEclAZMEBdAVIj3dYJJHwXeKjfiIKgC0g6cpIVZPTlzSV31Y/HKfu6gFGgavHiIyleVb1UqCVWRooDAhQZ0J+LT2AqhQAjSoUqYHI0qVKt5IVKlSoAVKlSoAVIUqVAg0KVKgAigaNKgCfh6g3bYIkF1BB2ILDevQb1GlXM9ofNE6/s35ZeBGtTrSpVzmdND6p8WPsz8R+tKlTpfOirE/wCKX0Zh0qVKuqeaKuMPV8qKUqVMZOtSilSqImOFOFKlQIcO1IUqVIBUqVKgQqNGlQAjQNKlQA2lSpUAIUKVKgY2lSpUwP/Z" alt="player">
                    </div>
                    <div class="information info-tournament">
                        <div class="registed">
                          <div class="number-players"><span><?php echo $tournament -> player_registed?></span>/<span><?php echo $tournament -> number_players?></span></div>
                          <div class="text">Đã tham gia</div>
                        </div>
                        <ul>
                            <li><span class="text-color-red"><?php echo $tournament -> name?></span></li>
                            <li>Hạng : <span class="text-color-red"><?php $rankings = Model_RankingTournament::get_rankings_tournament($tournament -> id); foreach($rankings as $ranking) echo $ranking -> ranking." "; ?></span></li>
                            <li>Lệ phí: <span class="text-color-red"><?php echo number_format($tournament -> fees)?> VND</span></li>
                            <li>Địa chỉ: <span class="text-color-red"><?php echo $tournament -> address;?></span></li>
                            <li>Thời gian: <span class="text-color-red"><?php $timestamp = strtotime($tournament -> start_date); echo date('d/m/Y h:i A',$timestamp);?></span></li>
                            <li>Quán quân: <span class="text-color-red"><?php echo number_format($tournament -> money_top_1);?> VND</span></li>
                            <li>Á quân: <span class="text-color-red"><?php echo number_format($tournament -> money_top_2);?>  VND</span></li>
                            <li>Giải 3: <span class="text-color-red"><?php echo number_format($tournament -> money_top_3);?>  VND</span></li>
                        </ul>
                        <div><p style="text-align: right;">Ấn để đăng ký ngay</p></div>
                    </div>
                </div>
            </button>
        
        <?php  endforeach;?>
    </div>
    <!-- Modal -->
    <div class="modal-register-tournament modal fade" id="RegisterTournamentModal" role="dialog">
        <div class="modal-dialog">
        
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
            <p>Bạn đồng ý tham gia giải đấu </p> <p id="nameTournament"></p>
            </div>
            <div class="modal-footer">
            <button id="btn-qr" type="button" class="btn-register btn btn-default"  data-dismiss="modal" data-toggle="modal" data-target="">Đăng ký ngay</button>
            <button type="button" class="btn-cancel btn btn-default " data-dismiss="modal">Huỷ</button>
            </div>
        </div>
        
        </div>
    </div>
    <?php echo View::forge('player/modal/modal_qr_tournament');?>
    <?php echo View::forge('player/modal/modal_not_register_tournament');?>
</body>
<?php include"footer.php";?>
 <!-- Modal -->

<script>
     function registerTournament(id,fees,rankings)
     {
        var xhr = new XMLHttpRequest();

        // Cấu hình yêu cầu
        xhr.open("GET", "http://localhost:8000/api/tournament/"+id, true);

        // Thiết lập hàm callback cho khi yêu cầu hoàn tất
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Xử lý dữ liệu trả về
                var data = JSON.parse(xhr.responseText);
                console.log(xhr.responseText);
                document.getElementById("nameTournament").innerHTML = data.name;
                document.getElementById("btn-qr").onclick = function() {
                        <?php
                            if(!empty(Session::get('logged_in')))
                            {
                                $check_login = true;
                                $player = Model_Player::get_detail_player(Session::get('id'));
                                $player_id = $player -> id;
                                $player_rank = $player -> ranking;
                            }
                            else
                            {
                                $check_login = false;
                            }
                        ?>
                        var checkLogin = <?php echo json_encode($check_login);?>;
                        if  (checkLogin == true)
                        {
                            <?php
                                if(!empty($player_id))
                                {
                                    echo "var playerId = ".json_encode($player_id).";";
                                    echo "var playerRank = ".json_encode($player_rank).";";
                                }
                            ?>
                            if(rankings.includes(playerRank))
                            {
                                document.getElementById("btn-qr").setAttribute("data-target", "#QrModal");
                                var srcImg = "https://img.vietqr.io/image/BIDV-12410003157606-compact2.png?amount="+fees+"&addInfo="+playerId+" "+id;
                                document.getElementById("img-qr").src = srcImg;
                                console.log("co the dk giai");
                            }
                            else
                            {
                                console.log("khong the dk giai");
                                document.getElementById("btn-qr").setAttribute("data-target", "#NotRegisterModal");
                            }
                        }
                        else
                        {
                            
                            document.getElementById("btn-qr").setAttribute("data-target", "#exampleModal");
                        }
                        
            } }else {
                console.error("Error: " + xhr.status);
            }
        };
        xhr.send();
     }
    </script>
</html>

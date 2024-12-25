from http.server import SimpleHTTPRequestHandler
from socketserver import TCPServer
from os import *

def run_server(port):
    handler = SimpleHTTPRequestHandler
    chdir(path.dirname(path.abspath(__file__)))

    with TCPServer(("127.0.0.1", port), handler) as httpd:
        print(f"Сервер работает на порту {port}...")
        httpd.serve_forever()


port = int(input('Введите желаемый порт: '))
run_server(port)

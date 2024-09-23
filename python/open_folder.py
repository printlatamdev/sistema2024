import os
import sys

# obtiene la ruta del archivo de entrada desde los argumentos de línea de comandos
input_file = sys.argv[1]

# verifica si el archivo existe
if not os.path.isfile(input_file):
    print("El archivo {input_file} no existe")
    sys.exit(1)

# abre el archivo de entrada y lee su contenido
with open(input_file, 'r') as f:
    content = f.read()

# procesa el contenido del archivo como sea necesario
processed_content = content.upper()

# crea un archivo de salida con el contenido procesado
output_file = 'processed.txt'
with open(output_file, 'w') as f:
    f.write(processed_content)

# imprime la ruta del archivo de salida para que PHP pueda leerlo
print(os.path.abspath(output_file))

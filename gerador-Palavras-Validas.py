arquivo2 = open('teste001.txt', 'r')
lista2 = arquivo2.readlines()
arquivo2.close()

arquivo = open('palavras.txt', 'r')
lista = arquivo.readlines()
arquivo.close()
#print(lista)

arquivo3 = open('Palavras-Validadas.txt', 'w')

for x in lista:
  for y in lista2:
    if x == y:
        arquivo3.write(x)

arquivo3.close()

#-*- coding: utf-8 -*-
#--------------------------------Dependencies---------------------------------#
cell_lines="/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/cell_lines.txt"
datasets="/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/datasets.txt"
expression_level="/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/expression_level_MCF7.txt"
genes="/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/genes_symbol.txt"
geneset="/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/geneset_example_with_reactome.txt"

#--------------------------------Functions---------------------------------#

def parse_cellLine(file):
	"""
	@brief      Parsing of the cell-lines file

	@param      file  The file containing all the cell lines
	
	@return     A dictionnary containing the cell line and the replicates
	"""
	
	dico = {}
	with open(file, 'r') as f :
		for line in f.readlines() :
			data = line.split('\t\t')
			if len(data) == 2 :
				dico[data[0]] = data[1].rstrip('\n')
		#print(dico)
		return dico

def parse_name(file):
	"""
	@brief      Parsing of the datasets file
	
	@param      file  The file containing all the datasets
	
	@return     A list containing all the datasets
	"""
	liste = []
	with open(file, 'r') as f :
		for line in f.readlines() :
			liste.append(line.rstrip('\n'))
		liste.pop(0) #delete the first element
		while '' in liste : #delete all the empty lines
			liste.remove('')
		#print(liste)
		return liste

def parse_expLevel(file):
	"""
	@brief      Parsing the expression level file
	
	@param      file  The file containing 
	
	@return     { description_of_the_return_value }
	"""
	pass

def parse_geneset(file):
	"""
	@brief      Parsing the geneset file
	
	@param      file  The file all the geneset
	
	@return     A dictionnary containing all the geneset and its value is a list
	"""
	listeF = []
	dico = {}
	name = ""
	with open(file, 'r') as f :
		for line in f.readlines() :
			if line.startswith('$') :
				name = line.lstrip('$')
			elif line.startswith('[') or line.startswith(' ') :
				print(line)
				ID = line.split()
				liste.append(ID[1:-1])
				#print(liste)
			
			dico[name] = listeF
			print(dico)
			#while line.startswith('[') or line.startswith(' ') :
				#print(line)
				#print(name)
			pass



#----------------------------------Main-----------------------------------#
parse_cellLine(cell_lines)
#parse_name(datasets)
#parse_name(genes)
#parse_expLevel(expression_level)
#parse_geneset(geneset)





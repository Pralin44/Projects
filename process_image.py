import sys
from DogBreedClassifier import DogBreedClassifier
import traceback

def main(image_path):
    try:
        classifier = DogBreedClassifier()
        result = classifier.classify(image_path)
        print(result.encode('utf-8'))
    except Exception as e:
        print(f"Error: {str(e)}".encode('utf-8'))
        traceback.print_exc()

if __name__ == "__main__":
    if len(sys.argv) > 1:
        img_path = sys.argv[1]
        main(img_path)
    else:
        print("No image file path provided.".encode('utf-8'))

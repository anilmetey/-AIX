from PIL import Image
import numpy as np

# Load the image
img = Image.open('public/images/ai_hologram_hero.png').convert('RGBA')
data = np.array(img)

# Extract R, G, B channels
r, g, b, a = data[:,:,0], data[:,:,1], data[:,:,2], data[:,:,3]

# Calculate luminance (or just max of RGB) as the new alpha channel
# Using max(R,G,B) is good for preserving colors on a black background
new_alpha = np.maximum(np.maximum(r, g), b)

# Create a mask for where alpha > 0 to avoid division by zero
mask = new_alpha > 0

# Un-premultiply the RGB channels to get the true color
# R_true = R / Alpha, G_true = G / Alpha, B_true = B / Alpha
# We use floats for precision, then scale back to 0-255
r_new = np.zeros_like(r, dtype=np.float32)
g_new = np.zeros_like(g, dtype=np.float32)
b_new = np.zeros_like(b, dtype=np.float32)

r_new[mask] = (r[mask].astype(np.float32) / new_alpha[mask].astype(np.float32)) * 255.0
g_new[mask] = (g[mask].astype(np.float32) / new_alpha[mask].astype(np.float32)) * 255.0
b_new[mask] = (b[mask].astype(np.float32) / new_alpha[mask].astype(np.float32)) * 255.0

# Clip to 0-255 and cast to uint8
r_new = np.clip(r_new, 0, 255).astype(np.uint8)
g_new = np.clip(g_new, 0, 255).astype(np.uint8)
b_new = np.clip(b_new, 0, 255).astype(np.uint8)

# Reassign to data array
data[:,:,0] = r_new
data[:,:,1] = g_new
data[:,:,2] = b_new
data[:,:,3] = new_alpha

# Save the resulting image
Image.fromarray(data).save('public/images/ai_hologram_hero.png')
print("Transparency applied successfully.")
